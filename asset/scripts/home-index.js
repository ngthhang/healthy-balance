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


