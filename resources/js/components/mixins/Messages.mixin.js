export const Messages = {

    data () {

        return {

            toast: {
                html: '',
                inDuration: 300,
                outDuration: 375,
            }

        }

    },
    
    methods: {

        showMessage (message) {

            this.toast.html = message;
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