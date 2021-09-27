moment.suppressDeprecationWarnings = true;

export default {
    filters: {
        date: function (date) {
            if (!date) return ''
            let dt = moment(date)
            if(!dt.isValid())
                return date;

            return dt.utc(date).local().format('DD.MM.Y');
        },
        dateTime: function (date) {
            if (!date) {
                return ''
            }

            const dt = moment(date)

            return dt.isValid()
                ? dt.utc(date).local().format('DD.MM.Y HH:mm')
                : date;
        },

    },
};
