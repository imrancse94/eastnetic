<template>
    <div>
        <div class="container py-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <span class="anchor" id="formPayment"></span>
                            <!-- form card cc payment -->
                            <div class="card card-outline-secondary">
                                <div class="card-body">
                                    <h3 class="text-center">URL Shortener</h3>
                                    <div v-if="shortUrl" class="alert alert-success text-center">
                                        <strong>{{ message }}</strong> <br/>
                                        {{ shortUrl }}
                                    </div>
                                    <hr>
                                    <form @submit.prevent="shortenUrl" autocomplete="off" class="form" role="form">
                                        <div class="form-group">
                                            <label for="url">URL</label>
                                            <input v-model="url" class="form-control"
                                                   :class="errors.url ? 'is-invalid':''" id="url" type="text">
                                            <div v-if="errors.url" class="invalid-feedback">{{ errors.url }}</div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <div class="col-md-4 offset-4">
                                                <button class="btn btn-primary btn-lg btn-block" :disabled="loading" type="submit">
                                                    <span v-if="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                    {{loading ? 'Loading...':'Submit'}}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- /form card cc payment -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {Api} from './../Api';

export default {
    name: 'App',
    data() {
        return {
            url: '',
            shortUrl: '',
            loading: false,
            message: "",
            errors: {},
        }
    },
    methods: {
        shortenUrl(e) {
            this.loading = true;
            this.error = false;
            Api.post('store-url', {
                url: this.url
            }).then(response => {
                let final_response = response.data;
                if (final_response.statuscode == 100) {
                    this.shortUrl = final_response.data.shortener_url;
                    this.loading = false;
                    this.message = final_response.message;
                } else {
                    this.errors = final_response.data;
                    this.loading = false;
                }

            }).catch(error => {
                this.error = error.response.data.message;
                this.loading = false;
            });
        }
    }
}
</script>
