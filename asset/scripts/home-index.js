function onRoute(id){
    if(id === 'landing-login'){
        $('#controller').val('login');
        $('#action').val('index');
    }
    else{
        $('#controller').val('home');
        $('#action').val(id);
    }
    document.landingMenu.submit();
}

function onRouteUser(id) {
    if (id === 'logout') {
        window.location.href = 'index.php?controller=login&action=logout';
        return
    }
    if (id === 'landing') {
        $('#controller').val('landing');
        $('#action').val('index');
    }
    else {
        $('#controller').val('home');
        $('#action').val(id);
    }
    document.menuSide.submit();
}

function onRouteStaff(id) {
    if (id === 'logout') {
        window.location.href = 'index.php?controller=login&action=logout';
        return
    }
    if (id === 'landing') {
        $('#controller').val('landing');
        $('#action').val('index');
    }
    else {
        $('#controller').val('staff');
        $('#action').val(id);
    }
    document.menuStaff.submit();
}

function changeUserData() {
    let useremail = $('.useremail').val();
    let password = $('.userpassword').val();
    let phone = $('.userphone').val();
    let name = $('.username').val();
    let error_message = $('#error-message');

    if (useremail == '' || !useremail.includes('@gmail.com')) {
        error_message.html('Email is invalid, please enter again');
        error_message.show();
        event.preventDefault();
        return false
    }
    else if (phone == '' || phone.length < 10 || phone.length > 10 || phone[0] != 0) {
        error_message.html('Phone is invalid, please enter again');
        error_message.show();
        event.preventDefault();
        return false
    }
    else if (password == '') {
        error_message.html('Password is not null, please enter again');
        error_message.show();
        event.preventDefault();
        return false
    }
    else if (name == '') {
        error_message.html('Name is not null, please enter again');
        error_message.show();
        event.preventDefault();
        return false
    }
    return true
}

function makePayment(){
    var radios = document.getElementsByName("course");
    for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
            var courseId = radios[i].value;
            $(".id_course").val(courseId);
            $(".controller").val("bill");
            $(".action").val("payment");
            document.payment.submit();        
            break;
        }
    }
}

function viewInfo(id) {
    $(".id_course").val(id);
    $(".controller").val("course");
    $(".action").val("view");
    document.viewCourseInfo.submit();
}

function back(controller, action) {
    $(".controller").val(controller);
    $(".action").val(action);
    document.formCourseView.submit();
}

function cancelCourse(courseId) {
    $(".id_course").val(courseId);
    $(".controller").val("course");
    $(".action").val("cancel");
    document.formCourseView.submit();
}

function cancelCourseInSchedule(courseId) {
    $(".id_course").val(courseId);
    $(".controller").val("course");
    $(".action").val("cancel");
    document.viewCourseInfo.submit();
}


function registerCourse(courseId) {
    $(".id_course").val(courseId);
    $(".controller").val("course");
    $(".action").val("register");
    document.formCourseView.submit();
}

function registerCourseInSchedule(courseId) {
    $(".id_course").val(courseId);
    $(".controller").val("course");
    $(".action").val("register");
    document.viewCourseInfo.submit();
}

function viewBill(billId) {
    $(".id_bill").val(billId);
    document.detailBill.submit();
}

function viewCourse(id) {
    $(".id_course").val(id);
    $(".controller").val("course");
    $(".action").val("staff_view");
    document.viewCourseInfo.submit();
}

function editCourse(id) {
    $(".id_course").val(id);
    $(".controller").val("course");
    $(".action").val("edit");
    document.formCourseView.submit();
}

function editCourseInStaffCourse(id) {
    $(".id_course").val(id);
    $(".controller").val("course");
    $(".action").val("edit");
    document.viewCourseInfo.submit();
}

function deleteCourse(id) {
    $(".id_course").val(id);
    $(".controller").val("course");
    $(".action").val("delete");
    document.viewCourseInfo.submit();
}


function editInfoPt(id) {
    $(".pt_id").val(id);
    $(".controller").val("instructor");
    $(".action").val("edit");
    document.viewInstructorInfo.submit();
}

function deleteInstructor(id) {
    $(".pt_id").val(id);
    $(".controller").val("instructor");
    $(".action").val("delete");
    document.viewInstructorInfo.submit();
}