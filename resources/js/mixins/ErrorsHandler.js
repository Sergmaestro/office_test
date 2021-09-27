export const ErrorsHandler = {
    data() {
        return {
            formErrors: {},
        }
    },
    methods: {
        handleErrors(errors) {
            this.formErrors = {};
            Object.keys(errors).forEach((key) => {
                let error = errors[key];
                this.formErrors[key] = Array.isArray(error) ? error.join(' ') : error.toString();
            });
        },
        clearFormErrors(formRefName) {
            if (formRefName && this.$refs[formRefName]) {
                this.$refs[formRefName].clearValidate()
            }

            this.formErrors = {};
        },
        errorsToString(errors) {
            let res = '';

            Object.keys(errors).forEach((key) => {
                if (res) res += '\r\n'
                let error = errors[key];
                res += Array.isArray(error) ? error.join(' ') : error.toString();
            });

            return res;
        },
        getRulesForString(
            fieldName,
            required = false,
            maxLength = 0,
            minLength = 0
        ) {
            let rules = []

            required && rules.push({
                required: true,
                message: `The ${fieldName} field is required.`,
                trigger: 'blur'
            });

            maxLength && rules.push({
                max: maxLength,
                message: `The ${fieldName} may not be greater than ${maxLength} characters.`,
                trigger: 'blur'
            });

            minLength && rules.push({
                min: minLength,
                message: `The ${fieldName} may not be less than ${minLength} characters.`,
                trigger: 'blur'
            });

            return rules;
        },
    }
};
