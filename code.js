function Feild(testRegex) {
    this.regex = testRegex;
    this.isValid = true;

    this.val = "";

    this.Validate = function() {
        if (!this.val.test(isValid)) {
            this.isValid = false;
            return false;
        }
        return true;
    }
}

document.ready
var MainVue = new Vue({
    el: "#main-vue",
    data: {
        descFeild: new Feild(/./),
        priceFeild: new Feild(/^\d*\.\d\d$/),
        percentFeild: new Feild(/./)
    }

})