<template>
    <el-form ref="officeForm"
             :model="office"
             :rules="rules"
             hide-required-asterisk label-width="120px">
        <div class="row">
            <div class="col-lg-8">
                <el-form-item label="Name" :error="formErrors.name" prop="name">
                    <el-input v-model="office.name" ref="nameInput"></el-input>
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
        </div>
        <el-row>
            <el-form-item>
                <el-button type="primary" :loading="loading" @click="onSubmit">
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
        },
        data() {
            return {
                loading: false,
                fit: 'cover',
                office: this.model,
                rules: {
                    name: this.getRulesForString('name', true, 255),
                    description: this.getRulesForString('description', false, 65535),
                    email: [
                        { message: 'Please input email address', trigger: 'blur' },
                        {
                            type: 'email',
                            message: 'Please input correct email address',
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
            this.$refs.nameInput.focus();
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
                            axios.post(route('office.create'), this.organization)
                                .then(res => {
                                    this.$message.success('Successfully created!');
                                    setTimeout(() => location.assign(
                                        route('office.show', res.data.id)), 3000
                                    )
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
                                this.$message.success('Successfully updated!');
                            }).catch(err => {
                                if (err.response.status === 422) {
                                    this.handleErrors(err.response.data.errors);
                                }
                            }).finally(() => this.loading = false);
                        }
                    }
                });
            },
            onCancel() {
                location.assign(route('office.index'));
            }
        }
    }
</script>
