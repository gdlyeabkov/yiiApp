<?php

namespace app\controllers;

use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ResumeSearch;
use app\models\Resume;

class ResumeController extends Controller
{
    public $layout = 'resumeLayout';

    public function actionMyResume()
    {
        $myResumeList = Resume::find()->all();
        $myResumeList = array_filter($myResumeList, function ($item) {
            if ($item->tag == "me") {
                return true;
            }
            return false;
        });
        return $this->render('my-resume', ["myResumeList" => $myResumeList]);
    }

    public function actionResumeList($search = null, $sort = null, $genderFilter = null, $cityFilter = null, $salaryFilter = null, $specializationFilter = null, $ageFromFilter = null, $ageToFilter = null, $experienceFilter = null, $employmentFilter = null, $sheduleFilter = null)
    {
       $searchModel = new ResumeSearch();
       $dataProvider = $searchModel->search(Yii::$app->request->get());
//
//        return $this->render('resume-list', [
//            'dataProvider' => $dataProvider,
//            'searchModel' => $searchModel,
//        ]);
        if ($search) {
            $resumeList = Resume::find()->where(["like", 'specialization', $search]);
            $countQuery = clone $resumeList;
        } else {
            $resumeList = Resume::find();
            $countQuery = clone $resumeList;
        }
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);
        $models = $resumeList->offset($pages->offset)->limit($pages->limit)->all();

        if ($sort) {
            $resumeList = $resumeList->orderBy($sort);

        }

        if ($genderFilter) {
            $resumeList = $resumeList->andWhere(['gender' => $genderFilter]);
        }
        if ($cityFilter) {
            $resumeList = $resumeList->andWhere(['recidense' => $cityFilter]);
        }
        if ($salaryFilter) {
            $resumeList = $resumeList->andWhere(['salary' => $salaryFilter]);
        }
        if ($specializationFilter) {
            $resumeList = $resumeList->andWhere(['specialization' => $specializationFilter]);
        }
        if ($ageFromFilter) {
            $resumeList = $resumeList->andWhere(['>', 'age', $ageFromFilter]);
        }
        if ($ageToFilter) {
            $resumeList = $resumeList->andWhere(['<', 'age', $ageToFilter]);
        }
        if ($experienceFilter) {
            $resumeList = $resumeList->andWhere(['experience' => $experienceFilter]);
        }
        if ($employmentFilter) {
            $resumeList = $resumeList->andWhere(['employment' => $employmentFilter]);
        }

        $resumeList = $resumeList->all();
        // return $this->render('resume-list', ['resumeList' => $resumeList, 'models' => $models, 'pages' => $pages]);
        return $this->render('resume-list', ['dataProvider' => $dataProvider,'searchModel' => $searchModel,'resumeList' => $resumeList, 'models' => $models, 'pages' => $pages]);
    }

    public function actionResumeView($id)
    {
        $resu = Resume::findOne(['id' => (int)$id]);
        return $this->render('resume-view', ['resu' => $resu]);
    }

    public function actionEditRegResume($edittedResumeID)
    {
        $edittedResume = Resume::findOne($edittedResumeID);
        $model = new Resume();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // change the record data in the database
            // $edittedResume = $model;
            // $edittedResume->update();
            $model->update();
            return $this->render('my-resume', ["myResumeList" => []]);

        } else {
            $modelErrors = $model->hasErrors() ? $model->hasErrors : [];
            return $this->render('edit-reg-resume', ["model" => $model, "edittedResume" => $edittedResume, "edittedResumeID" => $edittedResumeID,"modelErrors" => $modelErrors]);
        }
    }

    public function actionEditRegResumeDelete($edittedResumeID)
    {
        $model = new Resume();
        $edittedResume = Resume::findOne(['id' => $edittedResumeID]);
        $edittedResume->places_of_work = "";
        $edittedResume->update();

    }

    public function actionEditRegResumeRemove($edittedResumeID)
    {
        $edittedResume = Resume::findOne(['id' => $edittedResumeID]);
        $edittedResume->delete();
    }
}
