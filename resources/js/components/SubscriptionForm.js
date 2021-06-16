/**
 * Subscriptions class
 */
export default class SubscriptionForm {

    /**
     * Constructor
     * 
     * @return {void}
     */
    constructor() {
        this.form = document.querySelector('#subscription_form');
        this.messages = this.form.querySelector('.messages');

        this.fields = {
            email: this.form.querySelector(`#email`),
        }
    }


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

        $(() => {

            // Executed when the user submits the form
            this.form.addEventListener('submit', (event) => {

                event.stopPropagation();
                event.preventDefault();

                this.removeMessages();

                const params = {
                    email: this.fields.email.value.trim(),
                };

                const valid = this.validateForm(params);
                if (!valid) return;

                axios.post(route('api.subscribe'), params).then(res => {

                    const data = res.data;
                    if (data.success === undefined) throw new Exception('An error happened.');

                    this.addMessage('You have been subscribed correctly.', 'success');
                    this.fields.email.value = '';
                }).catch(error => {

                    if (typeof error === 'string') {
                        this.addMessage(error, 'error');
                        return;
                    }
                    const data = JSON.parse(error.request.response, true);

                    for (let [key, err] of Object.entries(data.errors)) {
                        this.addMessage(err[0], 'error');
                    }
                });
            });

            this.fields.email.addEventListener('change', (event) => {
                this.removeMessages();
            });
        });
    }

    /**
     * Validates the form to send it or show errors
     * 
     * @return {bool}
     */
    validateForm() {

        const email = this.fields.email.value;

        if (!email.length) {
            this.addMessage('The email cannot be empty.', 'error');
            return false;
        } else if (!email.match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
            this.addMessage('The email is not valid.', 'error');
            return false;
        }

        return true;
    }

    /**
     * Adds an error message to the form
     *
     * @param {string} message The messageto show
     * @param {string} type The message type (error / success)
     * 
     * @return {void}
     */
    addMessage(message, type) {
        const tag = document.createElement('li');
        tag.classList.add(type);

        tag.innerHTML = message;
        this.messages.appendChild(tag);
    }

    /**
     * Removes error messages from the form
     * 
     * @return {void}
     */
    removeMessages() {
        this.messages.innerHTML = '';
    }
}