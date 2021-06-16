/**
 * Subscriptions class
 */
export default class Subscriptions {

    /**
     * Executed when the document is ready
     * 
     * @return  {Object}
     */
    static create() {
        const instance = new this();
        instance.configure();
        return instance;
    }

    /**
     * Executed when crating the component
     * 
     * @return {void}
     */
    configure() {
        // Wait till the DOM content is loaded
        document.addEventListener("DOMContentLoaded", () => {

            // Make the first menu button active
            document.querySelector('.tabs-menu li:nth-child(1)').classList.add('selected');

            // Manage click of subscriptions/one off button
            const menuButtons = document.querySelectorAll('.tabs-menu li');
            menuButtons.forEach(menuButton => {
                this.menuClickManager(menuButton);
            });

            // Manage subscriptions clics
            const options = document.querySelectorAll('.tab.table .options a');
            options.forEach(option => {
                this.optionClickManager(option);
            });

            // Manage table options clicks
            const tableOptionsButtons = document.querySelectorAll('.tab.table .options a');
            tableOptionsButtons.forEach(option => {
                this.optionClickManager(option);
            });

            const optionsSelector = document.querySelector('.options-selector');
            this.optionSelectorManager(optionsSelector);
        });
    }

    /**
     * Handles the menu click (subscriptions/ one-off)
     * 
     * @return {void}
     */
     menuClickManager(button) {
        button.addEventListener("click", (event) => {

            event.stopPropagation();
            const element = event.currentTarget;
            const indexOrder = Array.prototype.indexOf.call(element.closest('ul').children, element.closest('li')) + 1;

            const menuButtons = element.closest('.tabs-menu').querySelectorAll('li');
            for (var i = 0; i < menuButtons.length; i++) {
                menuButtons[i].classList.remove('selected');
            }

            menuButtons[indexOrder - 1].classList.add("selected");

            const tabs = element.closest('.tabs').querySelectorAll('.tab');
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].classList.remove('active');
            }
            tabs[indexOrder - 1].classList.add("active");
        });
    }


    /**
     * Handles the different option clicks
     * 
     * @param {object} option
     * 
     * @return {void}
     */
    optionClickManager(option) {
        option.addEventListener("click", (event) => {

            event.stopPropagation();
            const element = event.currentTarget;
            const indexOrder = Array.prototype.indexOf.call(element.closest('ul').children, element.closest('li')) + 1;

            const selectField = element.closest('.tab').querySelector('select');
            selectField.querySelectorAll('option')[indexOrder -1].selected = true;

            this.switchTableOption(element, indexOrder);

        });
    }

    /**
     * Handles the select field change
     * 
     * @param {object} optionsSelector
     * 
     * @return {void}
     */
    optionSelectorManager(optionsSelector) {
        optionsSelector.addEventListener('change', (event) => {

            event.stopPropagation();
            const element = event.currentTarget;
            const indexOrder = element.selectedIndex + 1;

            this.switchTableOption(element, indexOrder);
        });
    }

    /**
     * Switch to a new option in the table
     * 
     * @param {number} element
     * @param {number} indexOrder
     * 
     * @return {void}
     */
    switchTableOption (element, indexOrder) {

            const tableCols = element.closest('.tab').querySelectorAll('.tabs-content .row div:not(.description)');
            const tableOptions = element.closest('.tab').querySelectorAll('.options a');

            for (var i = 0; i < tableOptions.length; i++) {
                tableOptions[i].classList.remove('selected');
            }
            tableOptions[indexOrder - 1].classList.add("selected");

            for (let i = 0; i < tableCols.length; i++) {
                tableCols[i].classList.remove('selected');
            }

            const tableActiveCols = element.closest('.tab.table').querySelectorAll(`.tabs-content .row div:nth-child(${indexOrder + 1})`);
            for (let i = 0; i < tableActiveCols.length; i++) {
                tableActiveCols[i].classList.add("selected");
            }

    }
}