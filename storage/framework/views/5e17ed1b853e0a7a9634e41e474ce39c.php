<button class="feedback" data-bs-toggle="offcanvas" href="#feedbackOffcanvas" role="button"
    aria-controls="feedbackOffcanvas">
    <span>Feedback Corner</span>
    <img class="information-icon" src="<?php echo e(asset('custom_frontend/frontend-assets/images/icons/Information.svg')); ?>"
        alt="information" onmouseover="showInformation()" onmouseout="hideInformation()">
</button>

<div class="information-contaianer" id="informationContainer">
    <p>Share your reviews, comments or any suggestions here. We value your input</p>
</div>

<div class="shedule-a-call offcanvas offcanvas-end" id="feedbackOffcanvas" aria-labelledby="feedbackOffcanvasLabel">

    <div class="offcanvas-body">
        <button type="button" class="btn btnclosecanvas bg-transparent border-0" data-bs-dismiss="offcanvas"
            aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 22 23" fill="none">
                <path
                    d="M21.165 3.98755C21.3442 3.81467 21.4871 3.60784 21.5855 3.37913C21.6838 3.15042 21.7357 2.90441 21.738 2.65545C21.7402 2.40649 21.6929 2.15957 21.5987 1.9291C21.5046 1.69862 21.3655 1.48921 21.1895 1.31308C21.0135 1.13695 20.8042 0.997627 20.5739 0.903242C20.3435 0.808856 20.0966 0.7613 19.8476 0.763345C19.5987 0.76539 19.3526 0.816997 19.1238 0.915154C18.895 1.01331 18.688 1.15605 18.515 1.33505L11 8.84755L3.48749 1.33505C3.31584 1.15084 3.10884 1.00308 2.87884 0.9006C2.64884 0.79812 2.40056 0.743015 2.1488 0.738573C1.89704 0.734131 1.64697 0.780443 1.4135 0.874746C1.18003 0.969048 0.967945 1.10941 0.789898 1.28746C0.611851 1.4655 0.47149 1.67759 0.377187 1.91106C0.282885 2.14453 0.236572 2.3946 0.241014 2.64636C0.245456 2.89812 0.300561 3.1464 0.403041 3.3764C0.505521 3.60639 0.653277 3.8134 0.837494 3.98505L8.34499 11.5L0.832494 19.0125C0.501294 19.368 0.320985 19.8381 0.329556 20.3239C0.338127 20.8096 0.534907 21.2731 0.87844 21.6166C1.22197 21.9601 1.68543 22.1569 2.17119 22.1655C2.65694 22.1741 3.12706 21.9937 3.48249 21.6625L11 14.15L18.5125 21.665C18.8679 21.9962 19.3381 22.1766 19.8238 22.168C20.3096 22.1594 20.773 21.9626 21.1165 21.6191C21.4601 21.2756 21.6569 20.8121 21.6654 20.3264C21.674 19.8406 21.4937 19.3705 21.1625 19.015L13.655 11.5L21.165 3.98755Z"
                    fill="black" />
            </svg>
        </button>
        <div class="shedular-col border-0">
            <form action="#" class="global-ajax-submit detail-form p-0 border-0"
                id="userFeedbackForm" data-success-fn='feedbackPopupSuccess' data-recaptcha-id="contact"
                data-error-fn='LearnerSignupError' data-check-validate="false"
                style="background-color: var(--greenshade);">

                <h2 class="enter-details">Let us <span style="color: #005BAA">hear you</span></h2>
                <div class="input-container mt-3">
                    <label class="form-label" for="userName">Your Name<span class="steric">*</span></label>
                    <input class="form-fields" type="text" id="userName" name="name" placeholder="John Deo"
                        required>
                </div>
                <div class="input-container" style="border-bottom: 1px solid #005BAA;">
                    <label class="form-label" for="userEmail2">Select Type<span class="steric">*</span></label>

                    <select class="feedbackSelect" name="type_feedback" id="feedbackType">
                        <option value="hide">Select</option>

                        <option value="General feedback">General Feedback</option>
                        <option value="Technical issue">Technical Issue</option>
                        <option value="User experience">User Experience</option>
                        <option value="Complain">Complain</option>
                        <option value="HR matters">HR Matters</option>
                        <option value="Suggestion">Suggestion</option>
                        <option value="Other">Other</option>
                    </select>
                    <input type="text" class="position-absolute top-0 opacity-0" style="z-index:-1;" name="type"
                        id="feedbackData" required>
                </div>



                <div class="input-container">
                    <label class="form-label" for="userMessage">Feedback Message<span class="steric">*</span></label>
                    <textarea class="user-comments" name="message" id="userMessage" placeholder="Enter your feedback" style="resize:none;"
                        required></textarea>
                </div>

                <button class="primaryblue loader-btn" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\crmgo\resources\views/frontend/layout/feedback.blade.php ENDPATH**/ ?>