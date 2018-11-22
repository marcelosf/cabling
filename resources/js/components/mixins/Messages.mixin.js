export const Messages = {

    data () {

        return {

            toast: {
                html: '',
                inDuration: 7,
                outDuration: 7,
            }

        }

    },
    
    methods: {

        showMessage (message) {

            this.toast.message = message;
            this.triggerMessage();

        },

        setInDuration (duration) {

            this.toast.inDuration = duration;

        },

        setOutDuration (duration) {

            this.toast.outDuration = duration;

        },

        triggerMessage () {

            M.toast(this.toast);

        }

    }

}