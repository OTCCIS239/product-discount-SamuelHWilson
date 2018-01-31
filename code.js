function field(id, testRegex) {
    this.regex = testRegex;
    this.isValid = true;
    this.id = id;

    this.val = "";
    var _this = this; //Workaround for event listener scope.

    this.Validate = function() {
        if (!this.regex.test(this.val)) {
            this.GetMad();
            return false;
        }
        return true;
    },
    this.GetMad = function() {
        document.getElementById(_this.id).removeEventListener("change", this.CalmDown, false); //To prevent excess events.
        this.isValid = false;
        document.getElementById(this.id).addEventListener("change", this.CalmDown, false);
    },
    
    this.CalmDown = function() {
        console.log(_this);
        _this.isValid = true;
        console.log(_this.isValid);
        document.getElementById(_this.id).removeEventListener("change", _this.CalmDown, false);
    }
}

document.ready
var MainVue = new Vue({
    el: "#main-vue",
    data: {
        fields: [
            new field("desc", /./),
            new field("price", /^\d*\.\d\d$/),
            new field("percent", /./)
        ]
    },
    methods: {
        ValidateAll() {
            var formValid = true;

            this.fields.forEach(field => {
                var valid = field.Validate();
                if (valid == false) {
                    formValid = false;
                }
            });

            return formValid;
        }
    }
})