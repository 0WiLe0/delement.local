<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/**
 * @var array $arResult
 */

use \Bitrix\Main\Localization\Loc;

$nameQuestion = $arResult['QUESTIONS']['SIMPLE_QUESTION_418'];
$phoneQuestion = $arResult['QUESTIONS']['SIMPLE_QUESTION_587'];
$emailQuestion = $arResult['QUESTIONS']['SIMPLE_QUESTION_131'];
$messageQuestion = $arResult['QUESTIONS']['SIMPLE_QUESTION_936'];
$fileQuestion = $arResult['QUESTIONS']['SIMPLE_QUESTION_236'];
$agreeQuestion = $arResult['QUESTIONS']['SIMPLE_QUESTION_394'];
$budgetQuestion = $arResult['QUESTIONS']['SIMPLE_QUESTION_619'];

$selectedServicesFieldName = 'form_text_16';
$agreeItem = reset($agreeQuestion['STRUCTURE']);

?>

<?= $arResult["FORM_HEADER"] ?>

<?php if ($arResult["isFormErrors"] == "Y"): ?>
    <pre><?php print_r($arResult["FORM_ERRORS"]); ?></pre>
    <div><?= $arResult["FORM_ERRORS_TEXT"] ?></div>
<?php endif; ?>

<?php if ($arResult["isFormNote"] == "Y"): ?>
    <div style="color: green; font-weight: bold;">
        <?= Loc::getMessage('B_FRN_FORM_DELEMENT_FORM_SEND_TEXT') ?>
    </div>
    <div><?= $arResult["FORM_NOTE"] ?></div>
<?php endif; ?>

    <section class="section section--order" data-js-scroll-effect data-js-scroll-effect--no-lock>
        <div class="section__body">
            <div class="contact-form">
                <div class="contact-form__aux">
                    <div class="conact-form__title">
                        <h2><?= Loc::getMessage('B_FRN_FORM_DELEMENT_APPLICATION_TITLE') ?></h2>
                    </div>
                    <div class="contact-form__desc">
                        <?= Loc::getMessage('B_FRN_FORM_DELEMENT_FOR_CONSULTATION_TEXT') ?>
                    </div>
                    <div class="contact-form__card-manager">
                        <div class="contact-form__label">
                            <?= Loc::getMessage('B_FRN_FORM_DELEMENT_YOUR_APPLICATION_TEXT') ?>
                        </div>
                        <figure class="card-manager">
                            <figcaption class="card-manager__label">
                                <div class="card-manager__name">
                                    <?= Loc::getMessage('B_FRN_FORM_DELEMENT_NAME_TEXT') ?>
                                </div>
                                <div class="card-manager__info">
                                    <?= Loc::getMessage('B_FRN_FORM_DELEMENT_POSITION_TEXT') ?>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="contact-form__desc contact-form__desc--note">
                        <?= Loc::getMessage('B_FRN_FORM_DELEMENT_LEAVE_REQUEST_TEXT') ?><a rel="contact"
                                                                                           href="tel:<?= Loc::getMessage('B_FRN_FORM_DELEMENT_LEAVE_REQUEST_PHONE') ?>"><?= Loc::getMessage('B_FRN_FORM_DELEMENT_LEAVE_REQUEST_PHONE') ?></a>
                    </div>
                </div>

                <div class="contact-form__main">

                    <div class="form-row">
                        <div class="form-col">
                            <label for="input-subject"><?= Loc::getMessage('B_FRN_FORM_DELEMENT_SELECT_SERVICE_TEXT') ?></label>

                            <select autocomplete="off" multiple id="input-subject" hidden name="services[]">
                                <?php foreach ($arResult['SERVICES_FORM'] as $service): ?>
                                    <option value="<?= (int)$service['ID'] ?>">
                                        <?= htmlspecialcharsbx($service['NAME']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                            <input type="hidden" name="form_text_16" id="selected-services-hidden" value=""/>

                            <ul class="tabs-cloud" id="services-tags">
                                <?php foreach ($arResult['SERVICES_FORM'] as $service): ?>
                                    <li class="tabs-cloud__item">
                                        <button
                                                type="button"
                                                class="tag"
                                                data-service-id="<?= (int)$service['ID'] ?>"
                                                data-service-name="<?= htmlspecialcharsbx($service['NAME']) ?>"
                                        >
                                            <?= htmlspecialcharsbx($service['NAME']) ?>
                                        </button>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="input-budget"><?= htmlspecialcharsbx($budgetQuestion['CAPTION']) ?></label>

                            <select autocomplete="off" id="input-budget" hidden name="form_radio_SIMPLE_QUESTION_619">
                                <?php foreach ($budgetQuestion['STRUCTURE'] as $item): ?>

                                    <option value="<?= (int)$item['ID'] ?>">
                                        <?= htmlspecialcharsbx($item['MESSAGE']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                            <ul class="tabs-cloud">
                                <?php foreach ($budgetQuestion['STRUCTURE'] as $item): ?>
                                    <li class="tabs-cloud__item">
                                        <div
                                                class="tag"
                                                data-js-select-filler='{ "select": "#input-budget", "value": "<?= (int)$item['ID'] ?>" }'
                                        >
                                            <?= htmlspecialcharsbx($item['MESSAGE']) ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="input-name"><?= htmlspecialcharsbx($nameQuestion['CAPTION']) ?></label>
                            <input
                                    placeholder="<?= htmlspecialcharsbx($nameQuestion['CAPTION']) ?>"
                                    name="form_text_10"
                                    id="input-name"
                                    type="text"
                                    class="form-input"
                                    data-input-required
                                    value="<?= htmlspecialcharsbx($_POST['form_text_10'] ?? '') ?>"
                            >
                        </div>

                        <div class="form-col">
                            <label for="input-phone"><?= htmlspecialcharsbx($phoneQuestion['CAPTION']) ?></label>
                            <input
                                    placeholder="+7 (___) ___ ____"
                                    id="input-phone"
                                    type="text"
                                    class="form-input inputmask"
                                    name="form_text_11"
                                    required
                                    data-input-required="phone"
                                    value="<?= htmlspecialcharsbx($_POST['form_text_11'] ?? '') ?>"
                            >
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="input-email"><?= htmlspecialcharsbx($emailQuestion['CAPTION']) ?></label>
                            <input
                                    placeholder="<?= htmlspecialcharsbx($emailQuestion['CAPTION']) ?>"
                                    id="input-email"
                                    name="form_email_12"
                                    type="email"
                                    class="form-input inputmask"
                                    value="<?= htmlspecialcharsbx($_POST['form_email_12'] ?? '') ?>"
                            >
                        </div>

                        <div class="form-col">
                            <label for="attachment" class="file-holder">
                                <button data-input-file--btn class="file-holder__btn" type="button">
                                    <svg>
                                        <use href="#icon-attach"></use>
                                    </svg>
                                    <svg>
                                        <use href="#icon-gallery-close"></use>
                                    </svg>
                                </button>
                                <span
                                        data-input-file--pseudo
                                        id="attachment-info"
                                        data-css-default-value="<?= htmlspecialcharsbx($fileQuestion['CAPTION']) ?>"
                                        class="file-holder__input"
                                ></span>
                                <input
                                        data-input-file
                                        autocomplete="off"
                                        type="file"
                                        name="form_file_14"
                                        class="file-holder__file"
                                        id="attachment"
                                />
                            </label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="input-message"><?= htmlspecialcharsbx($messageQuestion['CAPTION']) ?></label>
                            <textarea
                                    placeholder="<?= htmlspecialcharsbx($messageQuestion['CAPTION']) ?>"
                                    id="input-message"
                                    class="form-input"
                                    name="form_textarea_13"
                            ><?= htmlspecialcharsbx($_POST['form_textarea_13'] ?? '') ?></textarea>
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
                                <div class="form-note__text"><?= htmlspecialcharsbx($agreeQuestion['CAPTION']) ?></div>
                            </div>

                            <label class="checkbox" for="pers">
                                <input
                                        id="pers"
                                        class="checkbox__input"
                                        type="checkbox"
                                        value="<?= (int)$agreeItem['ID'] ?>"
                                        name="form_checkbox_SIMPLE_QUESTION_394[]"
                                        tabindex="-1"
                                        required
                                        data-input-required="checkbox"
                                        checked
                                >
                                <span class="checkbox__emulator">
                            <svg class="checkbox__icon i-icon">
                                <use xlink:href="#icon-mark"></use>
                            </svg>
                        </span>
                                <span class="checkbox__label">
                                <?= Loc::getMessage('B_FRN_FORM_DELEMENT_AGREE_PROCESSING_TEXT') ?><a
                                            href="#"><?= Loc::getMessage('B_FRN_FORM_DELEMENT_AGREE_PROCESSING_LINK_TEXT') ?></a>
                        </span>
                            </label>
                        </div>

                        <div class="form-col">
                            <button
                                    type="submit"
                                    name="web_form_submit"
                                    value="<?= (int)$arResult['arForm']['ID'] ?>"
                                    class="btn btn--large btn--blue hvr-radial-out"
                            >
                                <?= htmlspecialcharsbx($arResult["arForm"]["BUTTON"]) ?>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            const servicesSelect = document.getElementById('input-subject');
            const hiddenServicesField = document.getElementById('selected-services-hidden');
            const serviceButtons = document.querySelectorAll('#services-tags .tag');

            if (!form || !servicesSelect || !hiddenServicesField || !serviceButtons.length) {
                return;
            }

            serviceButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    const serviceId = this.dataset.serviceId;
                    const option = servicesSelect.querySelector('option[value="' + serviceId + '"]');

                    this.classList.toggle('is-active');

                    if (option) {
                        option.selected = this.classList.contains('is-active');
                    }

                    updateSelectedServicesField();
                });
            });

            form.addEventListener('submit', function () {
                updateSelectedServicesField();
            });

            function updateSelectedServicesField() {
                const selectedNames = [];

                serviceButtons.forEach(function (button) {
                    if (button.classList.contains('is-active')) {
                        selectedNames.push(button.dataset.serviceName);
                    }
                });

                hiddenServicesField.value = selectedNames.join(', ');
            }
        });
    </script>

<?= $arResult["FORM_FOOTER"] ?>