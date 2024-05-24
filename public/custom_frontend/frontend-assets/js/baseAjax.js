// var successResposneLimit=0;!function(e){"use strict";e.ajaxSetup({headers:{"X-CSRF-TOKEN":e('meta[name="csrf-token"]').attr("content")}}),e(document).ready(function(){e("form.global-ajax-submit").bind("submit",function(t){if("false"===e(this).attr("data-check-validate"))return!1;t.preventDefault(),e(this).find(".alert").remove(),console.log("submitting"),console.log("Ajax Calling");var a=e(this).attr("action"),s=e(this).attr("id");if(!s)return console.log("Form Id is required"),!1;if(document.querySelectorAll("#"+s).length>1)return console.log("Duplicate Ids not allowed"),!1;var r=e(this);return e(r).find("button[type=submit]").prop("disabled",!0),e(r).find("input[type=submit]").prop("disabled",!0),e(r).find("button[type=submit]").addClass("loading disabled"),e(r).find("input[type=submit]").addClass("loading"),e.ajax({headers:{"X-CSRF-TOKEN":e('meta[name="csrf-token"]').attr("content"),Accept:"application/json"},method:"POST",url:a,data:new FormData(this),mimeType:"multipart/form-data",contentType:!1,cache:!1,processData:!1,beforeSend:function(){},success:function(t){t=JSON.parse(t),r.removeClass("loading disabled"),console.log("success"),e(r).find("input,textarea,select").removeClass("valid error"),e(r).find("button[type=submit]").attr("disabled",!1),e(r).find("input[type=submit]").attr("disabled",!1),e(r).find("button[type=submit]").removeClass("loading disabled"),e(r).find("input[type=submit]").removeClass("loading disabled"),e(r)[0].reset(),t.formId=s;var a=r.data("success-fn");r.data("recaptcha-id"),void 0!=a&&window[a]?Function(a+"("+JSON.stringify(t)+")")():(!0==t.status||t.message)&&(console.log(t.message),toastr.success(t.message,"Success"))
// ,e("#"+s)[0].reset(),e("#"+s).attr("data-check-validate","false")},error:function(t,a,i){console.log("request",t),e("#"+s).attr("data-check-validate","false"),e(".error-text").remove(),e(".alert-danger").remove(),e(r).find("button[type=submit]").attr("disabled",!1),e(r).find("input[type=submit]").attr("disabled",!1),e(r).find("button[type=submit]").removeClass("loading disabled"),e(r).find("input[type=submit]").removeClass("loading disabled");let n=null;n=JSON.parse(t.responseText),console.log("errorResponse",n.errors);var o=r.data("error-fn");if(void 0!=o&&window[o]&&Function(o+"("+JSON.stringify(n)+")")(),!1==n.status&&422!=n.statusCode)return console.log(n.message),toastr.error(n.message,"Error"),!1;if(422==n.statusCode){var d=r.data("recaptcha-id");d&&grecaptcha.ready(function(){grecaptcha.execute(captchaID,{action:d}).then(function(t){e("#"+s).find("[name='"+d+"-recaptcha-response']").val(t)})})}e.each(n.errors,function(t,a){e(document).find("#"+s+" [name="+t+"]").after('<label class="error" for="'+t+'">'+a+"</label>")})}}),!1});function t(e){try{return JSON.stringify(e),!0}catch(t){return!1}}})}(jQuery);


var successResposneLimit = 0;

(function(e) {
    "use strict";
    e.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": e('meta[name="csrf-token"]').attr("content")
        }
    });

    e(document).ready(function() {
        e("form.global-ajax-submit").bind("submit", function(t) {
            if ("false" === e(this).attr("data-check-validate")) {
                return !1;
            }

            t.preventDefault();
            e(this).find(".alert").remove();
            console.log("submitting");
            console.log("Ajax Calling");

            var a = e(this).attr("action");
            var s = e(this).attr("id");

            if (!s) {
                console.log("Form Id is required");
                return !1;
            }

            if (document.querySelectorAll("#" + s).length > 1) {
                console.log("Duplicate Ids not allowed");
                return !1;
            }

            var r = e(this);

            e(r).find("button[type=submit]").prop("disabled", !0);
            e(r).find("input[type=submit]").prop("disabled", !0);
            e(r).find("button[type=submit]").addClass("loading disabled");
            e(r).find("input[type=submit]").addClass("loading");

            e.ajax({
                headers: {
                    "X-CSRF-TOKEN": e('meta[name="csrf-token"]').attr("content"),
                    Accept: "application/json"
                },
                method: "POST",
                url: a,
                data: new FormData(this),
                mimeType: "multipart/form-data",
                contentType: !1,
                cache: !1,
                processData: !1,
                beforeSend: function() {},
                success: function(t) {
                    t = JSON.parse(t);
                    r.removeClass("loading disabled");
                    console.log("success");
                    e(r).find("input,textarea,select").removeClass("valid error");
                    e(r).find("button[type=submit]").attr("disabled", !1);
                    e(r).find("input[type=submit]").attr("disabled", !1);
                    e(r).find("button[type=submit]").removeClass("loading disabled");
                    e(r).find("input[type=submit]").removeClass("loading disabled");
                    e(r)[0].reset();
                    t.formId = s;
                    var a = r.data("success-fn");
                    r.data("recaptcha-id");
                    void 0 != a && window[a] ?
                        Function(a + "(" + JSON.stringify(t) + ")")() :
                        (!0 == t.status || t.message) &&
                        (console.log(t.message), toastr.success(t.message, "Success"));
                    e("#" + s)[0].reset();
                    e("#" + s).attr("data-check-validate", "false");
                },
                error: function(t, a, i) {
                    console.log("request", t);
                    e("#" + s).attr("data-check-validate", "false");
                    e(".error-text").remove();
                    e(".alert-danger").remove();
                    e(r).find("button[type=submit]").attr("disabled", !1);
                    e(r).find("input[type=submit]").attr("disabled", !1);
                    e(r).find("button[type=submit]").removeClass("loading disabled");
                    e(r).find("input[type=submit]").removeClass("loading disabled");
                    let n = null;
                    n = JSON.parse(t.responseText);
                    console.log("errorResponse", n.errors);
                    var o = r.data("error-fn");
                    if (void 0 != o && window[o] && Function(o + "(" + JSON.stringify(n) + ")")(), !1 == n.status && 422 != n.statusCode) {
                        console.log(n.message);
                        toastr.error(n.message, "Error");
                        return !1;
                    }
                    // if (422 == n.statusCode) {
                    //     var d = r.data("recaptcha-id");
                    //     d &&
                    //         grecaptcha.ready(function() {
                    //             grecaptcha.execute(captchaID, {
                    //                 action: d
                    //             }).then(function(t) {
                    //                 e("#" + s).find("[name='" + d + "-recaptcha-response']").val(t);
                    //             });
                    //         });
                    // }
                    e.each(n.errors, function(t, a) {
                        e(document).find("#" + s + " [name=" + t + "]").after('<label class="error" for="' + t + '">' + a + "</label>");
                    });
                }
            });
        });
    }, !1);

    function t(e) {
        try {
            return JSON.stringify(e), !0;
        } catch (t) {
            return !1;
        }
    }
})(jQuery);
