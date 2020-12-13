<style>
    .d-flex{
        width:30%;
        display:flex;
        flex-direction:column;
        
        justify-content:start;
        align-self:start;
        align-items:start;
    }
</style>
<?php
use \yii\widgets\LinkPager;
?>
<div class="header-search">
    <div class="container">
        <div class="header-search__wrap">
            <form class="header-search__form">
                <a href="#"><img src="images/dark-search.svg" alt="search"
                                    class="dark-search-icon header-search__icon"></a>
                <input class="header-search__input mySearch" type="text" placeholder="Поиск по резюме и навыкам">
                <button type="button" class="blue-btn header-search__btn" onclick="location.href=`http://myheadhunter/web/index.php?r=//resume/resume-list&search=` + document.querySelector('.mySearch').value" >Найти</button>
            </form>
        </div>
    </div>
</div>
<div class="content">
    <div class="container">
        <h1 class="main-title mt24 mb16">PHP разработчики в Кемерово</h1>
        <button class="vacancy-filter-btn">Фильтр</button>
        <div class="row">
            <div class="col-lg-9 desctop-992-pr-16">
                <div class="d-flex align-items-center flex-wrap mb8">
                    <span class="paragraph mr16">Найдено <?= $resumeList->count; ?> резюме</span>
                    <div class="vakancy-page-header-dropdowns">
                        <div class="vakancy-page-wrap show mr16">
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">За день</a>
                                <a class="dropdown-item" href="#">За год</a>
                                <a class="dropdown-item" href="#">За все время</a>
                            </div>
                        </div>
                        <div class="vakancy-page-wrap show">
                            <a class="vakancy-page-btn vakancy-btn dropdown-toggle" href="#" role="button"
                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                По новизне
                                <i class="fas fa-angle-down arrowDown"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="http://myheadhunter/web/index.php?r=//resume/resume-list&queryFilters=date_updated">По новизне</a>
                                <a class="dropdown-item" href="http://myheadhunter/web/index.php?r=//resume/resume-list&queryFilters=salary">По возрастанию зарплаты</a>
                                <a class="dropdown-item" href="http://myheadhunter/web/index.php?r=//resume/resume-list&queryFilters=salary%20DESC">По убыванию зарплаты</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php foreach ($resumeList as $resume): ?>
                    <div class="vakancy-page-block company-list-search__block resume-list__block p-rel mb16">
                        <div class="company-list-search__block-left">
                            <div class="resume-list__block-img mb8">
                                <img src="<?= $resume->photo ?>" alt="profile">
                            </div>
                        </div>
                        <div class="company-list-search__block-right">
                            <div class="mini-paragraph cadet-blue mobile-mb12">Обновлено <?= $resume->date_updated ?></div>
                            <h3 class="mini-title mobile-off"><?= $resume->specialization ?></h3>
                            <div class="d-flex align-items-center flex-wrap mb8 ">
                                <span class="mr16 paragraph"><?= $resume->salary ?> ₽</span>
                                <span class="mr16 paragraph">Опыт работы <?=  $resume->experience && $resume->experience != 0  ?  $resume->experience . ' года' : 'Без опыта работы' ?> </span>
                                <span class="mr16 paragraph">Возраст<?= $resume->age ?> года</span>
                                <p class="paragraph tbold mobile-off">Последнее место работы</p>
                                <span class="mr16 paragraph"><?= end(explode(",", $resume->places_of_work)) ?></span>
                                    <?php foreach(explode(',', $resume->dateWork) as $dateBeginAndDateEnd): ?>
                                        <p class="paragraph tbold mobile-off">Дата начала и дата завершения работы :</p>
                                        <?php foreach(explode('|', $dateBeginAndDateEnd) as $dateBeginOrDateEnd): ?>
                                            
                                            <span class="mr16 paragraph"><?= $dateBeginOrDateEnd ?></span>
                                        <?php endforeach ?>
                                        <hr />
                                    <?php endforeach ?>
                                <p class="paragraph tbold mobile-off">Организация</p>
                                <span class="mr16 paragraph"><?= $resume->organization ?></span>
                                <p class="paragraph tbold mobile-off">Должность</p>
                                <span class="mr16 paragraph"><?= $resume->position ?></span>
                                <p class="paragraph tbold mobile-off">Обязанности, функции, достижения</p>
                                <span class="mr16 paragraph"><?= $resume->duties ?></span>
                                
                            </div>
                            
                        </div>
                        
                    </div>
                <?php endforeach ?>
                <?php
                    echo LinkPager::widget([
                            'pagination' => $pages,
                        ]);
                ?>
            </div>
            <div class="col-lg-3 desctop-992-pl-16 d-flex flex-column vakancy-page-filter-block vakancy-page-filter-block-dnone">
                <div
                        class="vakancy-page-filter-block__row mobile-flex-992 mb24 d-flex justify-content-between align-items-center">
                    <div class="heading">Фильтр</div>
                    <img class="cursor-p" src="images/big-cancel.svg" alt="cancel">
                </div>
                <div class="signin-modal__switch-btns-wrap resume-list__switch-btns-wrap mb16">
                    <a href="http://myheadhunter/web/index.php?r=//resume/resume-list" class="signin-modal__switch-btn active">Все</a>
                    <a href="http://myheadhunter/web/index.php?r=//resume/resume-list&genderFilter=male" class="signin-modal__switch-btn ">Мужчины</a>
                    <a href="http://myheadhunter/web/index.php?r=//resume/resume-list&&genderFilter=female" class="signin-modal__switch-btn ">Женщины</a>
                </div>
                <div class="vakancy-page-filter-block__row mb24">
                    <div class="paragraph cadet-blue">Город</div>
                    <div class="citizenship-select">
                        <select class="nselect-1 selectTwo">
                            <option value="01">Кемерово</option>
                            <option value="02">Новосибирск</option>
                            <option value="03">Иркутск</option>
                            <option value="04">Красноярск</option>
                            <option value="05">Барнаул</option>
                        </select>
                    </div>
                </div>
                <div class="vakancy-page-filter-block__row mb24">
                    <div class="paragraph cadet-blue">Зарплата</div>
                    <div class="p-rel">
                        <input placeholder="Любая" type="text" class="dor-input w100">
                        <img class="rub-icon" src="images/rub-icon.svg" alt="rub-icon">
                    </div>
                </div>
                <div class="vakancy-page-filter-block__row mb24">
                    <div class="paragraph cadet-blue">Специализация</div>
                    <div class="citizenship-select">
                        <select onblur="location.href=`http://myheadhunter/web/index.php?r=//resume/resume-list&specialization=` + document.querySelector(`.selectOne`).value" class="nselect-1 selectOne" data-title="Любая">
                            <option value="01">Фронтенд</option>
                            <option value="02">Бекенд</option>
                            <option value="03">Дизайн</option>
                            <option value="04">Тестировщик</option>
                        </select>
                    </div>
                </div>
                <div class="vakancy-page-filter-block__row mb24">
                    <div class="paragraph cadet-blue">Возраст</div>
                    <div class="d-flex">
                        <input placeholder="От" type="text" class="dor-input w100">
                        <input placeholder="До" type="text" class="dor-input w100">
                    </div>
                </div>
                <div class="vakancy-page-filter-block__row mb24">
                    <div class="paragraph cadet-blue">Опыт работы</div>
                    <div class="profile-info">
                        <div class="form-check d-flex">
                            <input onchange="location.href=`http://myheadhunter/web/index.php?r=//resume/resume-list&experienceFilter=0`" type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1"></label>
                            <label for="exampleCheck1" class="profile-info__check-text">Без опыта</label>
                        </div>
                        <div class="form-check d-flex">
                            <input onchange="location.href=`http://myheadhunter/web/index.php?r=//resume/resume-list&experienceFilter=1`" type="checkbox" class="form-check-input" id="exampleCheck2">
                            <label class="form-check-label" for="exampleCheck2"></label>
                            <label for="exampleCheck2" class="profile-info__check-text">От 1 года до 3
                                лет</label>
                        </div>
                        <div class="form-check d-flex">
                            <input onchange="location.href=`http://myheadhunter/web/index.php?r=//resume/resume-list&experienceFilter=3`" type="checkbox" class="form-check-input" id="exampleCheck3">
                            <label class="form-check-label" for="exampleCheck3"></label>
                            <label for="exampleCheck3" class="profile-info__check-text">От 3 лет до 6
                                лет</label>
                        </div>
                        <div class="form-check d-flex">
                            <input onchange="location.href=`http://myheadhunter/web/index.php?r=//resume/resume-list&experienceFilter=6`" type="checkbox" class="form-check-input" id="exampleCheck4">
                            <label class="form-check-label" for="exampleCheck4"></label>
                            <label for="exampleCheck4" class="profile-info__check-text">Более 6 лет</label>
                        </div>
                    </div>
                </div>
                <div class="vakancy-page-filter-block__row mb24">
                    <div class="paragraph cadet-blue">Тип занятости</div>
                    <div class="profile-info">
                        <div class="form-check d-flex">
                            <input type="checkbox" class="form-check-input" id="exampleCheck5">
                            <label class="form-check-label" for="exampleCheck5"></label>
                            <label for="exampleCheck5" class="profile-info__check-text">Полная занятость</label>
                        </div>
                        <div class="form-check d-flex">
                            <input type="checkbox" class="form-check-input" id="exampleCheck6">
                            <label class="form-check-label" for="exampleCheck6"></label>
                            <label for="exampleCheck6" class="profile-info__check-text">Частичная
                                занятость</label>
                        </div>
                        <div class="form-check d-flex">
                            <input type="checkbox" class="form-check-input" id="exampleCheck7">
                            <label class="form-check-label" for="exampleCheck7"></label>
                            <label for="exampleCheck7" class="profile-info__check-text">Проектная работа</label>
                        </div>
                        <div class="form-check d-flex">
                            <input type="checkbox" class="form-check-input" id="exampleCheck8">
                            <label class="form-check-label" for="exampleCheck8"></label>
                            <label for="exampleCheck8" class="profile-info__check-text">Стажировка</label>
                        </div>
                        <div class="form-check d-flex">
                            <input type="checkbox" class="form-check-input" id="exampleCheck9">
                            <label class="form-check-label" for="exampleCheck9"></label>
                            <label for="exampleCheck9" class="profile-info__check-text">Волонтёрство</label>
                        </div>
                    </div>
                </div>
                <div class="vakancy-page-filter-block__row mb24">
                    <div class="paragraph cadet-blue">График работы</div>
                    <div class="profile-info">
                        <div class="form-check d-flex">
                            <input type="checkbox" class="form-check-input" id="exampleCheck10">
                            <label class="form-check-label" for="exampleCheck10"></label>
                            <label for="exampleCheck10" class="profile-info__check-text">Полный день</label>
                        </div>
                        <div class="form-check d-flex">
                            <input type="checkbox" class="form-check-input" id="exampleCheck11">
                            <label class="form-check-label" for="exampleCheck11"></label>
                            <label for="exampleCheck11" class="profile-info__check-text">Сменный график</label>
                        </div>
                        <div class="form-check d-flex">
                            <input type="checkbox" class="form-check-input" id="exampleCheck12">
                            <label class="form-check-label" for="exampleCheck12"></label>
                            <label for="exampleCheck12" class="profile-info__check-text">Вахтовый метод</label>
                        </div>
                        <div class="form-check d-flex">
                            <input type="checkbox" class="form-check-input" id="exampleCheck13">
                            <label class="form-check-label" for="exampleCheck13"></label>
                            <label for="exampleCheck13" class="profile-info__check-text">Гибкий график</label>
                        </div>
                        <div class="form-check d-flex">
                            <input type="checkbox" class="form-check-input" id="exampleCheck14">
                            <label class="form-check-label" for="exampleCheck14"></label>
                            <label for="exampleCheck14" class="profile-info__check-text">Удалённая
                                работа</label>
                        </div>
                    </div>
                </div>
                <div
                        class="vakancy-page-filter-block__row vakancy-page-filter-block__show-vakancy-btns mb24 d-flex flex-wrap align-items-center mobile-jus-cont-center">
                    <a class="link-orange-btn orange-btn mr24 mobile-mb12" href="#">Показать <span>1 230</span>
                        вакансии</a>
                    <a href="http://myheadhunter/web/index.php?r=//resume/resume-list&queryFilters=">Сбросить все</a>
                </div>
            </div>
        </div>
    </div>
</div>