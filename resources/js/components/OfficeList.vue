<template>
    <div class="container pt-4 pb-4">
        <div class="row">
            <div class="d-flex col-lg-12 justify-content-between page-info-holder">
                <h3>Offices</h3>
                <a class="btn btn-success"
                   :href="getURLByRouteName('office.edit', '0')">
                    Create Office
                </a>
            </div>
        </div>

        <div id="officeList">
            <div v-if="officeList.length" class="et-organization-list-heading pb-2">
                <div class="holder d-flex">
                    <div class="col-md-4 l-data">Name</div>
                    <div class="col-md-2 hide-mobile">Events</div>
                    <div class="col-md-2 m-data hide-mobile">Added</div>
                </div>
            </div>
            <div v-for="organization in officeList"
                class="pb-2 pt-2 w-100 organization-card d-flex">

                <div class="d-flex flex-fill organization-data-holder">
                    <div class="col-md-4 l-data overflow-hidden d-flex
                                flex-column justify-content-between align-items-start">
                        <a :href="getURLByRouteName('organization.show', organization.id)"
                           :title="organization.name"
                           class="font-weight-bold text-truncate mw-100">
                            {{ organization.name }}
                        </a>

                        <el-link icon="el-icon-edit"
                                 :href="getURLByRouteName('organization.edit', organization.id)">
                            Edit
                        </el-link>
                    </div>

                    <div class="col-md-4 l-data font-weight-bold overflow-hidden">
                        {{ organization.created_at }}
                    </div>

                </div>
            </div>

            <div v-if="!officeList.length"
                 class="et-no-items w-100 d-flex flex-column align-items-center justify-content-center">
                <div v-if="loading"></div>
                <div v-else>
                    <h3>No Offices found</h3>
                    <h3>Create your first office</h3>
                </div>
            </div>
        </div>

        <p v-if="loading" class="d-flex align-items-center justify-content-center p-1 m-0 mt-3 et-loader">
            <i class="et-icon-loading"></i> Loading...
        </p>
        <div id="loadMoreOffices" class="invisible p-4 mt-3"></div>
    </div>
</template>

<script>
    export default {
        name: "OfficeList",
        props: {
            offices: Array,
            noMore: { type: Boolean, default: () => false },
        },
        data() {
            return {
                resultsTimeout: null,
                officeList: this.offices,
                searchKeyword: null,
                finished: this.noMore,
                loading: false,
                nextPage: 2,
                searchStringSet: false,
            }
        },
        mounted() {
            window.onscroll = _ => {
                if (
                    !this.loading
                    && !this.finished
                    && $('#loadMoreOffices').isInViewport())
                {
                    this.load()
                }
            };
        },
        methods: {
            plural(name, count) {
                return count === 1 ? name : `${name}s`;
            },
            getURLByRouteName(name, params) {
                return route(name, params);
            },
            load(reload) {
                this.loading = true;

                if (reload) {
                    this.$set(this, 'officeList', []);
                    this.nextPage = 1;
                    this.finished = false;
                }

                if (!this.finished) {
                    clearTimeout(this.resultsTimeout);

                    this.resultsTimeout = setTimeout(() => {
                        axios.get(route('organization.index'), {
                            params: {page: this.nextPage++}
                        }).then((res) => {
                            this.finished = res.data.noMore;

                            if (res.data.offices) {
                                this.officeList = _.concat(this.officeList, res.data.offices.data);
                            }
                        })
                            .catch(err => {})
                            .finally(() => this.loading = false);
                    }, 700);
                }
            },
        }
    }
</script>

<style scoped lang="scss">
    @media (max-width: 480px) {
        .page-info-holder {
            flex-direction: column;
        }
    }
</style>
