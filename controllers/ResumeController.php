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
use app\models\Resume;
class ResumeController extends Controller
{
    public function actionMyResume()
    {
        $this->layout = 'resumeLayout';
        $myResumeList = Resume::find()->all();
        $myResumeList =array_filter($myResumeList,function($item){
            if($item->tag == "me"){
                return true;
            }
            return false;
        }); 
        return $this->render('my-resume', ["myResumeList" => $myResumeList]);
    }
    public function actionResumeList($search = null, $sort  = null, $genderFilter = null, $cityFilter = null, $salaryFilter = null, $specializationFilter = null, $ageFromFilter = null, $ageToFilter = null, $experienceFilter = null, $employmentFilter = null, $sheduleFilter = null)
    {
        $this->layout = 'resumeLayout';
        if($search){
            $resumeList = Resume::find()->where(["like", 'specialization', $search]);
            $countQuery = clone $resumeList;
        }else{
            $resumeList = Resume::find();
            $countQuery = clone $resumeList;
        }
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);
        $models = $resumeList->offset($pages->offset)->limit($pages->limit)->all();
        
        if($sort){
            $resumeList = $resumeList->orderBy("${$sort}");
            
        }
        
        if($genderFilter){
            $resumeList = $resumeList->where(['gender' => "${$genderFilter}"]);
        }
        if($cityFilter){
            $resumeList = $resumeList->where(['recidense' => "${$cityFilter}"]);
        }
        if($salaryFilter){
            $resumeList = $resumeList->where(['salary' => "${$salaryFilter}"]);
        }
        if($specializationFilter){
            $resumeList = $resumeList->where(['specialization' => "${$specializationFilter}"]);
        }
        if($ageFromFilter){
            $resumeList = $resumeList->where(['>', 'age', "${$ageFromFilter}"]);
        }
        if($ageToFilter){
            $resumeList = $resumeList->where(['<', 'age', "${$ageToFilter}"]);
        }
        if($experienceFilter){
            $resumeList = $resumeList->where(['experience' => "${$experienceFilter}"]);
        }
        if($employmentFilter){
            $resumeList = $resumeList->where(['employment' => "${$employmentFilter}"]);
        }
        
        $resumeList = $resumeList->all();
        return $this->render('resume-list', ['resumeList' => $resumeList, 'models' => $models, 'pages' => $pages]);
    }
    public function actionResumeView($id)
    {
        $this->layout = 'resumeLayout';
        $resu = Resume::findOne(['id' => (int)$id]);
        return $this->render('resume-view', ['resu' => $resu]);
    }
    public function actionEditRegResume($edittedResumeID)
    {
        $this->layout = 'resumeLayout';
        $model = new Resume();
        if ($model->load(Yii::$app->request->post())  && $model->validate()) {
                $model->photo = 'a';
                $model->update();
                return $this->render('my-resume',["myResumeList" => []]);
                
        }else{
                $modelErrors = $model->hasErrors() ? $model->hasErrors : [];
                return $this->render('edit-reg-resume', ["model" => $model, "edittedResume" => $edittedResume, "edittedResumeID" => $edittedResumeID, "modelErrors" => $errors]);
        }
    }
    public function actionEditRegResumeDelete($edittedResumeID){
        $this->layout = 'resumeLayout';
        $model = new Resume();
        $edittedResume = Resume::findOne(['id' => $edittedResumeID]);
        $edittedResume->places_of_work = "";
        $edittedResume->update();
        
    }
    public function actionEditRegResumeRemove($edittedResumeID){
        $this->layout = 'resumeLayout';
        $edittedResume = Resume::findOne(['id' => $edittedResumeID]);
        $edittedResume->delete();
    }
}
