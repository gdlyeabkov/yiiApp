<?php
/* @var $this yii\web\View */
/* @var $resu app\models\Resume */

$resu->views += 1;
$resu->update();
?>
<div class="content p-rel">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mt8 mb32"><a href="#"><img src="images/blue-left-arrow.svg" alt="arrow"> Резюме в
                        Кемерово</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-5 mobile-mb32">
                <div class="profile-foto resume-profile-foto"><img src="<?= $resu->photo ?>" alt="profile-foto">
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="main-title d-md-flex justify-content-between align-items-center mobile-mb16"><?= $resu->specialization ?>
                </div>
                <div class="paragraph-lead mb16">
                    <span class="mr24"><?= $resu->salary ?> ₽</span>
                    <span>Опыт работы <?= $resu->experience ?> года</span>
                </div>
                <div class="profile-info company-profile-info resume-view__info-blick">
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">Имя
                        </div>
                        <div class="profile-info__block-right company-profile-info__block-right"><?= $resu->name ?>
                        </div>
                    </div>
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">Возраст
                        </div>
                        <div class="profile-info__block-right company-profile-info__block-right"><?= $resu->age ?>
                            года(лет, год)
                        </div>
                    </div>
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">Занятость</div>
                        <div class="profile-info__block-right company-profile-info__block-right"><?= $resu->employment ?></div>
                    </div>
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">График работы
                        </div>
                        <div class="profile-info__block-right company-profile-info__block-right"><?= $resu->schedule ?>
                        </div>
                    </div>
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">Город проживания
                        </div>
                        <div class="profile-info__block-right company-profile-info__block-right"><?= $resu->recidense ?></div>
                    </div>
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">
                            Электронная почта
                        </div>
                        <div class="profile-info__block-right company-profile-info__block-right"><a
                                    href="#"><?= $resu->email ?></a></div>
                    </div>
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">
                            Телефон
                        </div>
                        <div class="profile-info__block-right company-profile-info__block-right"><a
                                    href="#"><?= $resu->phone ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="devide-border mb32 mt50"></div>
                <div class="tabs mb50">
                    <div class="tabs__content active">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="row mb16">
                                    <div class="col-lg-12"><h3 class="heading mb16">Опыт работы <?= $resu->experience ?>
                                            лет</h3></div>
                                    <div class="col-md-4 mb16">
                                        <div class="paragraph tbold mb8">Апрель 2013 — по настоящее время</div>
                                        <div class="mini-paragraph">7 лет 1 месяц</div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="paragraph tbold mb8">Программные системы Атлансис</div>
                                        <div class="paragraph tbold mb8">Директор по стратегическому развитию
                                        </div>
                                        <div class="paragraph">
                                            <!-- <= $resu->about ?> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb16">
                                    <div class="col-md-4 mb16">
                                        <!-- <div class="paragraph tbold mb8">Май 2006 — по Март 2013</div> -->
                                        <!-- <div class="mini-paragraph">6 лет 10 месяцев</div> -->
                                    </div>
                                    <div class="col-md-8">
                                        <!-- <div class="paragraph tbold mb8">Программные системы Атлансис</div> -->
                                        <!-- <div class="paragraph tbold mb8">Директор по стратегическому развитию -->
                                    </div>
                                    <div class="paragraph">
                                        <!-- <= $resu->about ?> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="company-profile-text mb64">
                                <h3 class="heading mb16">Обо мне</h3>
                                <?= $resu->about ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>