<div class="modal modal--addTaskModal modal--hide">

    <form class="form frame" method="post" action="/addTasks">

        <input type="text" class="form__input input--second" name="titleTask" placeholder="Tytuł zadania">

        <textarea class="form__textarea form__textarea--task" placeholder="Opis..." name="descriptionTask"></textarea>

        <div class="form__container-category-priority">

            <div class="form__category">
                <p class="form__title form__title--category">Wybierz kategorię: </p>

                <select name="category" class="form__category-select">
                    <option value="null" class="form__category-btn">
                        Brak kategorii
                    </option>
                    <option value="1" class="form__category-btn">Home</option>
                    <option value="2" class="form__category-btn">Car</option>
                    <option value="3" class="form__category-btn">Hobby</option>
                    <option value="4" class="form__category-btn">Home</option>
                    <option value="5" class="form__category-btn">Car</option>
                    <option value="6" class="form__category-btn">Hobby</option>
                </select>
            </div>

            <div class="form__priority">
                <p class="form__title form__title--priority">Wybierz priorytet: </p>
                <select name="priority" class="form__priority-select">
                    <option value="null" class="form__category-btn">
                        Brak priorytetu
                    </option>
                    <option value="1" class="form__priotity-btn">I</option>
                    <option value="2" class="form__priotity-btn">II</option>
                    <option value="3" class="form__priotity-btn">III</option>
                    <option value="4" class="form__priotity-btn">IV</option>
                    <option value="5" class="form__priotity-btn">V</option>
                </select>
            </div>

        </div>

        <p class="form__end-day">Data zakończenia: <input class="form__reminders-date" type="date" name="date"></p>

        <div class="form__reminders">
            <p class="form__title">Przypomnienie na maila
                <input class="form__reminders-checkbox" type="checkbox" name="checkboxReminder">
            </p>

            <p class="form__title-notification">Częstotliwość powiadomień: </p>

            <select name="notification" class="form__notification-select">
                <option value="null" class="form__notification-btn">
                    Brak przypomnień
                </option>
                <option value="1" class="form__notification-btn">Codziennie</option>
                <option value="2" class="form__notification-btn">Co dwa dni</option>
                <option value="3" class="form__notification-btn">Co tydzień</option>
                <option value="4" class="form__notification-btn">Dzień przed zakończeniem</option>
                <option value="5" class="form__notification-btn">W dzień zakończenia</option>
            </select>

        </div>

        <div class="form__container-btn">
            <button class="form__btn form__btn--add button">Dodaj</button>
            <button class="form__btn form__btn--cancel button">Anuluj</button>
        </div>

    </form>

</div>

<div class="modal modal--editTaskModal modal--hide">

    <form class="form frame" method="post" action="/">

        <input type="text" class="form__input input--second" name="titleTaskEdit" placeholder="Tytuł zadania">

        <textarea class="form__textarea form__textarea--task" placeholder="Opis..." name="descriptionTasEdit"></textarea>

        <div class="form__container-category-priority">

            <div class="form__category">
                <p class="form__title form__title--category">Wybierz kategorię: </p>

                <select name="categoryEdit" class="form__category-select">
                    <option value="0" class="form__category-btn">
                        Brak kategorii
                    </option>
                    <option value="1" class="form__category-btn">Home</option>
                    <option value="2" class="form__category-btn">Car</option>
                    <option value="3" class="form__category-btn">Hobby</option>
                    <option value="4" class="form__category-btn">Home</option>
                    <option value="5" class="form__category-btn">Car</option>
                    <option value="6" class="form__category-btn">Hobby</option>
                </select>
            </div>

            <div class="form__priority">
                <p class="form__title form__title--priority">Wybierz priorytet: </p>
                <select name="priorityEdit" class="form__priority-select">
                    <option value="0" class="form__category-btn">
                        Brak priorytetu
                    </option>
                    <option value="1" class="form__priotity-btn">I</option>
                    <option value="2" class="form__priotity-btn">II</option>
                    <option value="3" class="form__priotity-btn">III</option>
                    <option value="4" class="form__priotity-btn">IV</option>
                    <option value="5" class="form__priotity-btn">V</option>
                </select>
            </div>

        </div>


        <p class="form__end-day">Data zakończenia: <input class="form__reminders-date" type="date" name="dateEdit"></p>

        <div class="form__reminders">
            <p class="form__title">Przypomnienie na maila
                <input class="form__reminders-checkbox" type="checkbox" name="checkboxReminderEdit">
            </p>

            <p class="form__title-notification">Częstotliwość powiadomień: </p>

            <select name="notificationEdit" class="form__notification-select">
                <option value="0" class="form__notification-btn">
                    Brak przypomnień
                </option>
                <option value="1" class="form__notification-btn">Codziennie</option>
                <option value="2" class="form__notification-btn">Co dwa dni</option>
                <option value="3" class="form__notification-btn">Co tydzień</option>
                <option value="4" class="form__notification-btn">Dzień przed zakończeniem</option>
                <option value="5" class="form__notification-btn">W dzień zakończenia</option>
            </select>

        </div>

        <div class="form__container-btn">
            <button class="form__btn form__btn--confirm button">Potwierdź</button>
            <button class="form__btn form__btn--cancel button">Anuluj</button>
        </div>

    </form>

</div>

<div class="modal modal--previewTaskModal modal--hide">

    <form class="form frame">

        <p class="form__title form__title--title">Jakiś tytuł</p>
        <p class="form__title form__title--description">Lorem ipsum odor amet, consectetuer adipiscing elit. Bibendum habitant eu molestie urna purus molestie pretium? Justo ante scelerisque donec etiam posuere eros cras litora. Dui consequat maximus libero donec nam massa tortor pulvinar amet. Sociosqu ac sit ultricies facilisi tempor parturient.</p>
        <p class="form__title form__title--preview form__title--category">Kategoria: </p>
        <p class="form__title form__title--preview form__title--priority">Priorytet: </p>
        <p class="form__title form__title--preview form__title--end-date">Koniec: </p>

        <div class="form__container-preview-btn">
            <button class="form__preview-btn"><span class="form__check-box"></span></button>
            <button class="form__preview-btn"><span class="form__edit-document"></span></button>
            <button class="form__preview-btn"><span class="form__delete-forever"></span></button>
        </div>
        <button class="form__btn form__btn-preview form__btn--cancel button">Anuluj</button>

    </form>

</div>



<div class="modal modal--addCategoryModal modal--hide">

    <form class="form frame" method="post" action="/addCategories">

        <input type="text" class="form__input form__input--category input--second" name="category" placeholder="Nazwa kategorii">


        <div class="form__container-btn">
            <button class="form__btn form__btn--add button">Dodaj</button>
            <button class="form__btn form__btn--cancel button">Anuluj</button>
        </div>

    </form>

</div>

<div class="modal modal--editCategoryModal modal--hide">

    <form class="form frame" method="post" action="/">

    
        <input type="text" class="form__input form__input--category input--second" name="categoryEdit" placeholder="Nazwa kategorii">


        <div class="form__container-btn">
            <button class="form__btn form__btn--confirm button">Potwierdź</button>
            <button class="form__btn form__btn--cancel button">Anuluj</button>
        </div>

    </form>

</div>

<div class="modal modal--previewCategoryModal modal--hide">

    <form class="form frame">

        <p class="form__title form__title--preview-category form__title--category"></p>

        <div class="form__container-preview-btn">
            <button class="form__preview-btn"><span class="form__edit-document"></span></button>
            <button class="form__preview-btn"><span class="form__delete-forever"></span></button>
        </div>
        <button class="form__btn form__btn-preview form__btn--cancel button">Anuluj</button>

    </form>

</div>



<div class="modal modal--addNoteModal modal--hide">

    <form class="form frame">

        <input type="text" class="form__input form__input--note input--second" name="" placeholder="Tytuł notatki">

        <textarea class="form__textarea" placeholder="Opis..." name=""></textarea>
        <div class="form__container-btn">
            <button class="form__btn form__btn--add button">Dodaj</button>
            <button class="form__btn form__btn--cancel button">Anuluj</button>
        </div>

    </form>

</div>

<div class="modal modal--editNoteModal modal--hide">

    <form class="form frame">

        <input type="text" class="form__input form__input--note input--second" name="" placeholder="Tytuł notatki">

        <textarea class="form__textarea" placeholder="Opis..." name=""></textarea>
        <div class="form__container-btn">
            <button class="form__btn form__btn--confirm button">Potwierdź</button>
            <button class="form__btn form__btn--cancel button">Anuluj</button>
        </div>

    </form>

</div>

<div class="modal modal--previewNoteModal modal--hide">

    <form class="form frame">

        <p class="form__title form__title--note"></p>
        <p class="form__title form__description--note form__description--note--view"></p>

        <div class="form__container-preview-btn">
            <button class="form__preview-btn"><span class="form__edit-document"></span></button>
            <button class="form__preview-btn"><span class="form__delete-forever"></span></button>
        </div>
        <button class="form__btn form__btn-preview form__btn--cancel button">Anuluj</button>
    </form>

</div>