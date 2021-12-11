import moment from 'moment'

var mixin = {
    methods: {
        setDateFormat: function (date) {
            if(!date){
                return "";
            }
            return moment(date, 'YYYY-MM-DD').format('MM-DD-YYYY hh:mm A');
        }
    }
};

export default mixin;