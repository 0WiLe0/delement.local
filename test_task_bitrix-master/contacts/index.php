<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>
    <section class="section section--order" data-js-scroll-effect data-js-scroll-effect--no-lock>
        <div class="section__body">
            <div class="contact-form">
                <div class="contact-form__aux">
                    <div class="conact-form__title">
                        <h2>Заявка</h2>
                    </div>
                    <div class="contact-form__desc">
                        для консультации<br />
                        или подготовки<br />
                        предложения
                    </div>
                    <div class="contact-form__card-manager">
                        <div class="contact-form__label">
                            Ваши заявки принимает
                        </div>
                        <figure class="card-manager">
                            <figcaption class="card-manager__label">
                                <div class="card-manager__name">
                                    Надежда
                                </div>
                                <div class="card-manager__info">
                                    Коммерческий директор
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="contact-form__desc contact-form__desc--note">
                        Оставьте заявку или позвоните нам, мы сами <br />все за вас заполним <a rel="contact" href="tel:8-800-555-85-89">8-800-555-85-89</a>
                    </div>
                </div>
                <div class="contact-form__main">
                    <form id="order" action="#" class="form" data-form novalidate>

                        <div class="form-row">
                            <div class="form-col">
                                <label for="input-subject">Выберите интерисующие вас услуги</label>
                                <select autocomplete="off" multiple id="input-subject" hidden name="form_text_11">
                                    <option value="Индивидуальные сайты">Индивидуальные сайты</option>
                                    <option value="Готовые решения">Готовые решения</option>
                                    <option value="Поисковое продвижение сайтов">Поисковое продвижение сайтов</option>
                                    <option value="Реклама в интернете">Реклама в интернете</option>
                                    <option value="Техническая поддержка и хостинг">Техническая поддержка и хостинг</option>
                                    <option value="Автоматизация">Автоматизация</option>
                                    <option value="Геймификация">Геймификация</option>
                                </select>
                                <ul class="tabs-cloud">
                                    <li class="tabs-cloud__item">
                                        <div class="tag" data-js-select-filler='{ "select": "#input-subject", "value": "Индивидуальные сайты" }'> <!--  как value в опции выше  -->
                                            Индивидуальные сайты
                                        </div>
                                    </li>
                                    <li class="tabs-cloud__item">
                                        <div class="tag"  data-js-select-filler='{ "select": "#input-subject", "value": "Готовые решения" }'>
                                            Готовые решения
                                        </div>
                                    </li>
                                    <li class="tabs-cloud__item">
                                        <div class="tag"  data-js-select-filler='{ "select": "#input-subject", "value": "Поисковое продвижение сайтов" }'>
                                            Поисковое продвижение сайтов
                                        </div>
                                    </li>
                                    <li class="tabs-cloud__item">
                                        <div class="tag"  data-js-select-filler='{ "select": "#input-subject", "value": "Реклама в интернете" }'>
                                            Реклама в интернете
                                        </div>
                                    </li>
                                    <li class="tabs-cloud__item">
                                        <div class="tag"  data-js-select-filler='{ "select": "#input-subject", "value": "Техническая поддержка и хостинг" }'>
                                            Техническая поддержка и хостинг
                                        </div>
                                    </li>
                                    <li class="tabs-cloud__item">
                                        <div class="tag"  data-js-select-filler='{ "select": "#input-subject", "value": "Автоматизация" }'>
                                            Автоматизация
                                        </div>
                                    </li>
                                    <li class="tabs-cloud__item">
                                        <div class="tag"  data-js-select-filler='{ "select": "#input-subject", "value": "Геймификация" }'>
                                            Геймификация
                                        </div>
                                    </li>
                                </ul>








                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <label for="input-budget">Бюджет</label>
                                <select autocomplete="off" id="input-budget" hidden name="form_text_1464">
                                    <option value="Менее 1 млн">Менее 1 млн</option>
                                    <option value="1 - 3 млн">1 - 3 млн</option>
                                    <option value="3 - 5 млн">3 - 5 млн</option>
                                    <option value="5 - 10 млне">5 - 10 млн</option>
                                    <option value="10 - 25 млн">10 - 25 млн</option>
                                    <option value="Более 25 млн">Более 25 млн</option>
                                </select>
                                <ul class="tabs-cloud">
                                    <li class="tabs-cloud__item">
                                        <div class="tag" data-js-select-filler='{ "select": "#input-budget", "value": "Менее 1 млн" }'> <!--  как value в опции выше  -->
                                            Менее 1 млн
                                        </div>
                                    </li>
                                    <li class="tabs-cloud__item">
                                        <div class="tag"  data-js-select-filler='{ "select": "#input-budget", "value": "Готовые решения" }'>
                                            1 - 3 млн
                                        </div>
                                    </li>
                                    <li class="tabs-cloud__item">
                                        <div class="tag"  data-js-select-filler='{ "select": "#input-budget", "value": "3 - 5 млн" }'>
                                            3 - 5 млн
                                        </div>
                                    </li>
                                    <li class="tabs-cloud__item">
                                        <div class="tag"  data-js-select-filler='{ "select": "#input-budget", "value": "5 - 10 млн" }'>
                                            5 - 10 млн
                                        </div>
                                    </li>
                                    <li class="tabs-cloud__item">
                                        <div class="tag"  data-js-select-filler='{ "select": "#input-budget", "value": "10 - 25 млн" }'>
                                            10 - 25 млн
                                        </div>
                                    </li>
                                    <li class="tabs-cloud__item">
                                        <div class="tag"  data-js-select-filler='{ "select": "#input-budget", "value": "Более 25 млн" }'>
                                            Более 25 млн
                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-col">
                                <label for="input-name">Ваше имя</label>
                                <input placeholder="Ваше имя" name="name" id="input-name" type="text" class="form-input" data-input-required>
                            </div>

                            <div class="form-col">
                                <label for="input-phone">Контактный телефон</label>
                                <input placeholder="+7 (___) ___ ____" id="input-phone" type="text" class="form-input inputmask" name="phone" required data-input-required="phone">
                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-col">
                                <label for="input-email">Эл. почта</label>
                                <input placeholder="Эл. почта" id="input-email" name="email" type="email" class="form-input inputmask">
                            </div>

                            <div class="form-col">
                                <label for="attachment" class="file-holder">
                                    <button data-input-file--btn  class="file-holder__btn" type="button">
                                        <svg>
                                            <use href="#icon-attach"></use>
                                        </svg>
                                        <svg>
                                            <use href="#icon-gallery-close"></use>
                                        </svg>
                                    </button>
                                    <span data-input-file--pseudo id="attachment-info" data-css-default-value="Прикрепить файл" class="file-holder__input"></span>
                                    <input data-input-file autocomplete="off" type="file" name="file" class="file-holder__file" id="attachment" />
                                </label>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <label for="input-message">Комментарий к заказу</label>
                                <textarea placeholder="Комментарий к заказу" id="input-message" class="form-input" name="message"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col">

                                <div class="form-note">
                                    <div class="form-note__icon">
                                        <svg class="i-icon">
                                            <use xlink:href="#icon-info"></use>
                                        </svg>
                                    </div>
                                    <div class="form-note__text">Заполните все поля и опишите вашу задачу как можно подробнее</div>
                                </div>

                                <label class="checkbox" for="pers">
                                    <input id="pers" class="checkbox__input" type="checkbox" value="Y" name="pers" tabindex="-1" required data-input-required="checkbox" checked>
                                    <span class="checkbox__emulator">
                 <svg class="checkbox__icon i-icon">
                    <use xlink:href="#icon-mark"></use>
                  </svg>
                </span>
                                    <span class="checkbox__label">
                  Согласен на обработку <a href="#">персональных данных</a>
                </span>
                                </label>
                            </div>
                            <div class="form-col">
                                <button type="submit" class="btn btn--large btn--blue hvr-radial-out">Заказать услугу</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>