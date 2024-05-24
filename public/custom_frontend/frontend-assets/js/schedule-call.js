var userIp = null;
var timezone = null;
var selectedDate = new Date();
var availableSlots = []
var scheduleCallUrl=null
var smartWizardId=null
var timeZoneUrl=null
var localTimezone=null;
var localTimezoneVal=null;
var meetingDuration=null
var phoneInfo=null
var phoneInfoMobileView=null
var countryCode='pk'
var setInitialization=false;
var flatpickrInstance=null;


localTimezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
localTimezoneVal = new Date().toLocaleString('en-US', {
    timeZone: localTimezone,
    timeZoneName: 'short'
}).split(' ')[3];

if(!localTimezoneVal.includes(':')){
    localTimezoneVal = `${localTimezoneVal.toString().padStart(2, '0')}:00`+' - '+localTimezone;
}

document.addEventListener("DOMContentLoaded", function() {
    var scriptTag = document.querySelector('script[src*="schedule-call.js"]');
    scheduleCallUrl = scriptTag.getAttribute("data-param");
    timeZoneUrl = scriptTag.getAttribute("data-param2");
    meetingDuration = scriptTag.getAttribute("data-param3");
});

function setDefaultCountry(){

    phoneInfoMobileView?.setCountry(countryCode);
    phoneInfo?.setCountry(countryCode);
}


$('.time_slot-error').hide();
function getUserTimezoneFromIP() {
    const apiUrl = `https://ipapi.co/${userIp}/json/`;

    return fetch(apiUrl)
      .then(response => response.json())
      .then(data => data)
      .catch(error => {
        // console.error('Error fetching user timezone:', error);
        return null
      });
}

function bookingFormShow(Id) {
    // var localTimeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
    // var isMobile = window.innerWidth < 768; // Adjust the width based on your mobile breakpoint

    // let mobileSelector = document.getElementById('timeSelectorMobile');
    // if(mobileSelector){
    //     $('#timeSelectorMobile').val(localTimezone).trigger('change');
    // }

    // let desktopSelector = document.getElementById('timeSelecter');
    // if(desktopSelector){
    //     $('#timeSelecter').val(localTimezone).trigger('change');
    // }
    // Get the Select2 instance
    var $select2 = $('.time-selecter');
    // Add the new option to the data source used by Select2
    $select2.append(new Option(localTimezoneVal, localTimezone, true, true));
    // Trigger the 'change' event to update Select2's display
    $select2.trigger('change');

    timezone = localTimezone;
    smartWizardId=Id;

    dateChangeFunctionExperts();
    dateChangeFunction();

    if(customCurrentRouteName == 'frontend.contactUs'){
        $(".nextSlide").click();
    }

    // getAvailableSlots();
}


function getUserIpAddress() {
    return fetch('https://api.ipify.org/?format=json')
        .then(response => response.json())
        .then(data => data.ip);
}

function onChangeFlikrDate(instance) {
    // Call your custom function or perform actions here
    var selectedDateObj = instance.latestSelectedDateObj;
    var selectedYear = selectedDateObj.getFullYear();
    var selectedMonth = selectedDateObj.getMonth();
    var selectedDay = selectedDateObj.getDate();

    // Create a new date object with the selected date
    var newSelectedDate = new Date(selectedYear, selectedMonth, selectedDay);

    // Get the current date without the time
    var oldSelectedDate = new Date(selectedDate);
    oldSelectedDate.setHours(0, 0, 0, 0);

    // Compare the modified dates
    // if (newSelectedDate.getTime() !== oldSelectedDate.getTime()) {
        selectedDate.setFullYear(selectedYear, selectedMonth, selectedDay);

        getAvailableSlots();
    // }
}

function scheduleCallSuccess(response) {
    console.log("response success", response);
    if (response.status == true || response.message) {
        if (response.hasOwnProperty('formId')) {
            var formElement = $('#'+response.formId);
            if (formElement.attr('data-smart-wizard-id') !== undefined) {
                var wizardId = formElement.attr('data-smart-wizard-id');
                if ($("#"+wizardId) && customCurrentRouteName != 'frontend.contactUs') {
                    // $('#'+wizardId).smartWizard("reset");
                    // var height = $(".tab-pane:first-child").height();
                    setTimeout(() => {
                        $(".tab-pane").closest(".tab-content").css("height", "auto");
                        // console.log($(".tab-pane").closest(".tab-content").height());
                    }, 1000);

                    // for close meet our expert popup
                    if($('#meetOurExperts').hasClass('show')){
                        $('#meetOurExpertsCloseBtn').click();
                    }

                    // const section = document.getElementById('headingOne');
                    // section.scrollIntoView({ behavior: 'smooth' });
                }
                setDefaultCountry();
            }

            var elem = $(".step1-meet");
            $(".schedule-call-success").remove()
            // $(elem).prepend(
            //     '<div class="alert schedule-call-success alert-success  alert-dismissible fade show" role="alert">' +
            //     "<strong>Success! </strong>" +
            //     response.message +
            //     '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
            //     "</div>"
            // );
            // toastr.success(response.message, 'Success');
            // Swal.fire(
            //     response.message,
            //     '',
            //     'success'
            //   );
            window.location.href = '/thanku';
        }
    }

    availableSlots = []
    getAvailableSlots();
    $('#scheduleCallBackButon').click();
}

$(document).ready(function () {



    function setPhoneCountry(){
        phoneInfo = initializeCountry(countryCode, document.querySelector(".country-select"));
        let input = document.querySelector(".country-select-mobile");
        if(input){
            phoneInfoMobileView = initializeCountry(countryCode, input);
        }

    }

    function initialSelect2Library(){
        $('.time-selecter').select2({
            ajax: {
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    'Accept': 'application/json'
                },
                type: "post",
                url: timeZoneUrl,
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data.data, function (value, key) {
                            return {
                                id: key,
                                text: value
                            };
                        })
                    };
                },
                cache: false
            },
            placeholder: 'Select a timezone',
            // searchInputPlaceholder: 'asdasdas',
            minimumInputLength: 1 // You can adjust this as needed
        });
    }


    function initilaizeFlatPicker(){
        flatpickrInstance=flatpickr(".myID", {
            inline: true,
            dateFormat: "Y-m-d",
            minDate: "today",
            disable: [
              function(date) {

                var dateString = toISODate(date);
                var dayName = date.toLocaleDateString('en-US', { weekday: 'long' }).toLowerCase();

                // console.log(other_off_days, dateString,  other_off_days.includes(dateString) || weekend_off_days.includes(dayName));
                return (weekend_off_days.includes(dayName) || other_off_days.includes(dateString));
              }
            ],
            onChange: function(selectedDates, dateStr, instance) {
                if(customCurrentRouteName == 'frontend.contactUs'){
                    $(".nextSlide").click();
                }
                else{
                    $('#gotoNext').click();
                }
            //   dateChangeFunction();
              if (typeof onChangeFlikrDate === 'function') {
                onChangeFlikrDate(instance)

                if (window.innerWidth < 992) {
                    if(customCurrentRouteName == 'frontend.home'){
                        $(".nextSlide").click();
                    }
                  }
              }
            }

          });
    }


    getUserIpAddress()
        .then(ipAddress => {
            userIp = ipAddress;
            // Use the IP address as needed

            getUserTimezoneFromIP().then(userInfo =>{
                if(userInfo){
                    localTimezone = userInfo.timezone;
                    localTimezoneVal = 'GMT'+userInfo.utc_offset.replace(/(\d{2})(\d{2})/, '$1:$2')+' - '+userInfo.timezone;
                }
                else{
                    localTimezone = Intl.DateTimeFormat().resolvedOptions().timeZone; // if api failed to get timezone then set this by default
                    localTimezoneVal = localTimezone;
                }

                countryCode=userInfo ? userInfo.country_code : 'pk';

            }).catch(error => {
                // phoneInfo = initializeCountry('pk', document.querySelector(".country-select")) // set pk by default if api fail to get countryCode
                // let input = document.querySelector(".country-select-mobile");
                // if(input){
                //     phoneInfoMobileView = initializeCountry('pk', input);
                // }
            });

        })
        .catch(error => {
            console.error('Error:', error);
        });

    function  initializeCountry(defaultCountry, input){
        let intlObject = window.intlTelInput(input, {
                utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@15.1.2/build/js/utils.js",
                initialCountry: defaultCountry,
                separateDialCode: true,
                customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                    return selectedCountryPlaceholder.replace(/\s/g, '');
                },
                customContainer: "countryContainer",
                // autoPlaceholder: 'off',
            });

            let inputElement = intlObject.a;
            // console.log(intlObject);
            inputElement.addEventListener("open:countrydropdown", function() {
                if($(window).width()>991){
                    var field = $("#userPhoneNumber");
                    var fieldPos = field.offset();
                    var fieldWidth = field.outerWidth();
                    var fieldHeight = field.outerHeight();


                    // Set the position of the dropdown menu
                    $(".intl-tel-input.iti-container").css({
                        position: "absolute",
                        top: fieldPos.top + fieldHeight,
                        left: fieldPos.left,
                        width: fieldWidth,
                        height: 200,
                    });
                }else {
                    var field = $("#userPhoneNumber2");
                    var fieldPos = field.offset();
                    var fieldWidth = field.outerWidth();
                    var fieldHeight = field.outerHeight();


                    // Set the position of the dropdown menu
                    $(".intl-tel-input.iti-container").css({
                        position: "absolute",
                        top: fieldPos.top + fieldHeight,
                        left: fieldPos.left,
                        width: fieldWidth,
                        height: 200,
                    });
                }
                
              });

        setCountryInfo(intlObject);
        return intlObject;
    }


    document.querySelector(".country-select").addEventListener("countrychange", function() {
        setCountryInfo(phoneInfo);
    });
    document.querySelector(".country-select-mobile")?.addEventListener("countrychange", function() {
        setCountryInfo(phoneInfoMobileView);
    });

    function setCountryInfo(info){
        country_info = info.getSelectedCountryData();
        // console.log(country_info);
        const hiddenFields = {
            country_code: country_info.iso2,
            country_phone_code: country_info.dialCode,
        };

        generateHiddenFields(hiddenFields);
    }




    function generateHiddenFields(hiddenFields){

        $.each(hiddenFields, function (fieldName, fieldValue) {
            const existingField = $('#userDetailForm input[name="' + fieldName + '"]');
            if (existingField.length > 0) {
                existingField.val(fieldValue);
            } else {
                $('#userDetailForm').append('<input type="hidden" name="' + fieldName +
                    '" value="' + fieldValue + '">');
            }
        });
        $.each(hiddenFields, function (fieldName, fieldValue) {
            const existingField = $('#userDetailFormMobile input[name="' + fieldName + '"]');
            if (existingField.length > 0) {
                existingField.val(fieldValue);
            } else {
                $('#userDetailFormMobile').append('<input type="hidden" name="' + fieldName +
                    '" value="' + fieldValue + '">');
            }
        });
    }

    $('#timeSelectorMobile , #timeSelecter').on('change', function () {
        // Check if it's a mobile device
        var isMobile = window.innerWidth < 768; // Adjust the width based on your mobile breakpoint

        if (isMobile && $(this).attr('id') === 'timeSelectorMobile') {
            var selectedValue = $(this).val();
            timezone = selectedValue;
            if(timezone == null || timezone == ''){
                timezone = localTimezone;
            }
            getAvailableSlots();
        } else if (!isMobile && $(this).attr('id') === 'timeSelecter') {
            var selectedValue = $(this).val();
            timezone = selectedValue;
            if(timezone == null || timezone == ''){
                timezone = localTimezone;
            }
            getAvailableSlots();
        }
        if(setInitialization == false){
            setPhoneCountry();
            initilaizeFlatPicker();
            initialSelect2Library();
            setInitialization=true;
        }
    });

    $('.scheduleNextBtn').on('click', function (event) {
        console.log('clicked');
        var nearestTimeSlotInput = $('.slot-container').find('.time-field:checked');
        var timeSlotValue = nearestTimeSlotInput.val();

        console.log("timeSlotValue", timeSlotValue);

        if (!timeSlotValue || availableSlots.length == 0) {
            // Nearest time_slot input value is empty
            if (availableSlots.length != 0) $('.time_slot-error').show();
            event.preventDefault(); // Prevent the default button behavior
            event.stopPropagation(); // Stop event propagation
            return;
        }else{
            $(".next-slide").click();
        }


        // Get the current time slot value
        const timeSlot = timeSlotValue;

        // Convert the time slot to a Date object
        const startTime = new Date(`${selectedDate.toLocaleDateString('en-US')} ${timeSlot}`);

        // Add 30 minutes to the start time
        const endTime = new Date(startTime.getTime() + meetingDuration *
            60000); // Adding 30 minutes (30 * 60 * 1000 milliseconds)

        // Format the start and end times
        const formattedStartTime = startTime.toLocaleTimeString([], {
            hour: 'numeric',
            minute: 'numeric',
            hour12: true
        });
        const formattedEndTime = endTime.toLocaleTimeString([], {
            hour: 'numeric',
            minute: 'numeric',
            hour12: true
        });

        // Create the time range string
        const timeRange = `${formattedStartTime} - ${formattedEndTime}`;
        const options = {
            weekday: 'long',
            month: 'long',
            day: 'numeric',
            year: 'numeric'
        };
        const selectDateText = timeRange + ', ' + selectedDate.toLocaleDateString('en-US', options);
        // Update the element with the time range
        $('.date-time-c').text(selectDateText);


        // const timeZone = timezone;
        // var offset = new Date().toLocaleString('en-US', {
        //     timeZone: timeZone,
        //     timeZoneName: 'short'
        // }).split(' ')[3];

        // if(!offset.includes(':')){
        //     offset = `${offset.toString().padStart(2, '0')}:00`;
        // }

        // const timeZoneText = `(${offset}) - ${timeZone}`;
        // console.log("offset",offset,timeZoneText);

        $('.date-timezone').text($("#timeSelecter option:selected").text())

        let formattedDate2 = selectedDate.getFullYear() + '-' +
            ('0' + (selectedDate.getMonth() + 1)).slice(-2) + '-' +
            ('0' + selectedDate.getDate()).slice(-2) + ' ' +
            ('0' + selectedDate.getHours()).slice(-2) + ':' +
            ('0' + selectedDate.getMinutes()).slice(-2) + ':' +
            ('0' + selectedDate.getSeconds()).slice(-2);

        const hiddenFields = {
            timezone: timezone,
            user_ip: userIp,
            date: formattedDate2,
            time_slot: timeSlotValue,
        };

        generateHiddenFields(hiddenFields);

        // Nearest time_slot input value is not empty
        $('.time_slot-error').hide();
        $(".nextSlide").click();
        // $('.scheduleNextBtn').trigger('click');
        // Add your code to handle the non-empty case or proceed to the next step
    });

});

async function getAvailableSlots() {

    var formattedDate = selectedDate.getFullYear() + '-' +
    ('0' + (selectedDate.getMonth() + 1)).slice(-2) + '-' +
    ('0' + selectedDate.getDate()).slice(-2) + ' ' +
    ('0' + selectedDate.getHours()).slice(-2) + ':' +
    ('0' + selectedDate.getMinutes()).slice(-2) + ':' +
    ('0' + selectedDate.getSeconds()).slice(-2);



    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            'Accept': 'application/json'
        },
        method: "POST",
        url: scheduleCallUrl,
        data: {
            timezone: timezone,
            ip: userIp,
            // date: selectedDate.toISOString()
            date: formattedDate

        },
        beforeSend: function () {
            var smartWizardContact = $('#'+smartWizardId);
            if(smartWizardContact) smartWizardContact.find('.slot-container').addClass('section-load');
            // Perform any actions before sending the request (optional)
        },
        //****** Ajax call success function *******
        success: function (data) {
            // data = JSON.parse(data);

            if (data.status == true && data.statusCode == 200) {
                availableSlots = data.data;
                // console.log(availableSlots);
                $('.time_slot-error').hide();
                var html = '';
                var htmlForMobile = '';
                if (availableSlots.length > 0) {
                    $.each(availableSlots, function (key, value) {
                        html += `<input class="time-field" type="radio" value="${value}" id="radio${key}" name="time_slot">
                            <label for="radio${key}" class="time-label">${value}</label>`;

                        htmlForMobile += `<input class="time-field" type="radio" value="${value}" id="radio${key}m" name="time_slot">
                        <label for="radio${key}m" class="time-label">${value}</label>`;
                    });
                    $(".scheduleNextBtn").removeClass('disabled');
                } else {
                    const options = {
                        weekday: 'long',
                        month: 'long',
                        day: 'numeric',
                        year: 'numeric'
                    };
                    html += 'No Slots Available at ' + selectedDate.toLocaleDateString('en-US', options);
                    $(".scheduleNextBtn").addClass('disabled');

                    htmlForMobile += 'No Slots Available at ' + selectedDate.toLocaleDateString('en-US', options);
                    $(".scheduleNextBtn").addClass('disabled');
                }
                $(".slot-container.web-version").html(html);
                $(".slot-container.mobile-version").html(htmlForMobile);


            } else {
                var html = '';
                var htmlForMobile = '';
                $(".slot-container.web-version").html(html);
                $(".slot-container.mobile-version").html(htmlForMobile);
            }

            var smartWizardContact = $('#'+smartWizardId);
            if(customCurrentRouteName == 'frontend.home'){
                if($(window).width() < 992){
                    $(".next-slide").click();
                }
                dateChangeFunction();
            }else{
                dateChangeFunctionExperts();
            }


            if(smartWizardContact) smartWizardContact.find('.slot-container').removeClass('section-load');
        },
        //****** Ajax call error function *******

        error: function (request, status, error) {
            errorResponse = JSON.parse(request.responseText);
            var firstError;
            if(errorResponse.statusCode == 422){
                $.each(errorResponse.errors, function (field_name, error) {
                    if (!firstError) {
                        firstError = error;
                    }
                });

                if (firstError) {
                    toastr.error(firstError, 'Error');
                }
            }
            var smartWizardContact = $('#'+smartWizardId);
            if(smartWizardContact) smartWizardContact.find('.slot-container').removeClass('section-load');
        },
    });
}

function getTimeZones(){

    // $('.time-selecter').html('');
    // $.ajax({
    //     headers: {
    //         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //         'Accept': 'application/json'
    //     },
    //     type: "post",
    //     url: timeZoneUrl,
    //     success: function (response) {
    //         if (response.status == true && response.statusCode == 200) {
    //             const timeZones = response.data;
    //             // console.log(timeZones);
    //             if(timeZones){
    //                 Object.keys(timeZones).forEach(key => {
    //                     $('.time-selecter').append($('<option>', {
    //                         value: key,
    //                         text : timeZones[key]
    //                     }));
    //                 });
    //             }
    //         }
    //     }
    // });
}

function dateChangeFunction() {

    var slotLength = $(".slot-container .time-label").length;
    slotLength = slotLength/2;

    if($(window).width() > 520){

        if(slotLength >= 9){
            $(".slot-container").css("grid-template-columns",`repeat(${Math.ceil(slotLength/2)} ,105px)`);
        } else{
            $(".slot-container").css("grid-template-columns", "repeat(3, 105px)");
        }
    } else{
        if(slotLength >= 9){
            $(".slot-container").css("grid-template-columns",`repeat(${Math.ceil(slotLength/2)} ,66px)`);
        } else{
            $(".slot-container").css("grid-template-columns", "repeat(3, 66px)");
        }
    }
}

function dateChangeFunctionExperts() {

    if($(".slot-container.total-slots").length>0){
        var slotLength = $(".slot-container .time-label").length;

        if($(window).width() > 520){

            if(slotLength >= 7){
                $(".slot-container").css("grid-template-columns",`repeat(${Math.ceil(slotLength/2)} ,105px)`);
            } else{
                $(".slot-container").css("grid-template-columns", "repeat(3, 105px)");
            }
        } else{
            if(slotLength >= 7){
                $(".slot-container").css("grid-template-columns",`repeat(${Math.ceil(slotLength/2)} ,66px)`);
            } else{
                $(".slot-container").css("grid-template-columns", "repeat(3, 66px)");
            }
        }
    }

}
