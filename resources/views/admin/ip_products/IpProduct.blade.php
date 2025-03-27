<script>
    class IpProduct extends BaseClass {
        no_set = [];

        before(form) {
        }

        after(form) {

        }

        get product_id() {
            return this._product_id;
        }

        set product_id(value) {
            this._product_id = value;
        }

        get submit_data() {
            let data = {
                ip: this.ip,
                product_id: this.product_id,
            }
            data = jsonToFormData(data);

            return data;
        }
    }
</script>
