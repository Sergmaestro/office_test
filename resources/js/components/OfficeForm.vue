<template>
    <el-form ref="officeForm"
             :model="office"
             :rules="rules"
             hide-required-asterisk label-width="120px">
        <div class="col-lg-8">
            <el-form-item label="Name" :error="formErrors.name" prop="name">
                <el-input v-model="office.name" ref="nameInput"></el-input>
            </el-form-item>

            <el-form-item label="Country"
                          ref="countryField"
                          :rules="rules.country"
                          :error="formErrors['location.country_id']"
                          prop="location.country_id">
                <el-select v-model="office.location.country_id"
                           filterable
                           placeholder="Select country"
                           @change="setCountry"
                           class="w-100">
                    <el-option
                        v-for="item in countries"
                        :key="item.value"
                        :label="item.label"
                        :value="item.value">
                        {{ item.label }}
                        <span class="ml-2 float-right" style="color: #8492a6; font-size: 13px">
                            {{ item.code }} {{ item.flag }}
                        </span>
                    </el-option>
                </el-select>
            </el-form-item>

            <el-form-item label="Location" :error="formErrors['location.name']"
                          :rules="rules.location"
                          prop="location.name">
                <el-input v-model="office.location.name"></el-input>
            </el-form-item>

            <el-form-item label="Slug" v-if="office.id" :error="formErrors.slug" prop="slug">
                <el-input v-model="office.slug"></el-input>
            </el-form-item>

            <el-form-item label="Description" :error="formErrors.description" prop="description">
                <el-input type="textarea" v-model="office.description"></el-input>
            </el-form-item>

            <el-form-item label="Contact Email" :error="formErrors.email" prop="email">
                <el-input v-model="office.email"></el-input>
            </el-form-item>
        </div>
        <el-row>
            <el-form-item>
                <el-button type="primary"
                           :loading="loading"
                           :disabled="disabled"
                           @click="onSubmit">
                    {{ office.id ? 'Update' : 'Create' }}
                </el-button>
                <el-button @click="onCancel">Cancel</el-button>
            </el-form-item>
        </el-row>
    </el-form>
</template>

<script>
    import {ErrorsHandler} from "../mixins/ErrorsHandler";

    export default {
        name: 'officeForm',
        mixins: [ ErrorsHandler ],
        props: {
            model: Object,
            countries: { type: Array|Object, default: () => []}
        },
        data() {
            return {
                loading: false,
                disabled : false,
                fit: 'cover',
                office: this.model,
                rules: {
                    name: this.getRulesForString('name', true, 255),
                    country : { required: true, message: 'The country field is required.', trigger: 'blur' },
                    location: this.getRulesForString('location', true, 255),
                    description: this.getRulesForString('description', false, 65535),
                    email: [
                        { message: 'Please input email address', trigger: 'blur' },
                        {
                            type: 'email',
                            message: 'Please input valid email address',
                            trigger: 'blur',
                            transform(value) {
                                return value ? value.trim() : value;
                            },
                        },
                    ],
                    slug: this.getRulesForString('slug', this.model.id, 255),
                },
            }
        },
        mounted() {
            this.$nextTick(() => {
                this.$refs.nameInput && this.$refs.nameInput.focus();
            });
        },
        methods: {
            getRouteByName(name) {
                return route(name);
            },
            onSubmit() {
                this.$refs.officeForm.validate((valid) => {
                    if (valid) {
                        this.loading = true;

                        if (!this.office.id) {
                            axios.post(route('office.create'), this.office)
                                .then(res => {
                                    this.onSuccess('created');

                                })
                                .catch(err => {
                                    if (err.response.status === 422) {
                                        this.handleErrors(err.response.data.errors);
                                    }
                                })
                                .finally(() => this.loading = false);
                        } else {
                            axios.put(
                                route('office.update', {office: this.office.id}),
                                this.office
                            )
                            .then(res => {
                                this.onSuccess('updated');
                            }).catch(err => {
                                if (err.response.status === 422) {
                                    this.handleErrors(err.response.data.errors);
                                }
                            }).finally(() => this.loading = false);
                        }
                    }
                });
            },
            onSuccess(action) {
                this.$message.success(`Successfully ${action}!`);
                this.disabled = true;
                setTimeout(() => location.assign(
                    route('office.list')), 3000
                );
            },
            onCancel() {
                location.assign(route('office.list'));
            },
            setCountry(countryId) {
                this.$set(this.office.location, 'country_id', countryId);
                this.$refs.officeForm.clearValidate('location.country_id');
            }
        }
    }
</script>
