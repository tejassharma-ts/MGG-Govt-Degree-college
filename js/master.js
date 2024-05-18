function SubmitQuery1() {
    var Type = 'Admission Form';
    var Name = $('#txtNameP').val();
    //var Email = $('#txtEmailP').val();
    var Email = '';
    var PhoneNo = $('#txtPhoneP').val();
    //var City = $('#txtCityP').val();
    var City = '';
    var CourseCode = $("#ddlCourseP option:selected").val();
    var Course = $("#ddlCourseP option:selected").text();

    if (Name == '' || PhoneNo == '' || CourseCode == '0') {
        alert('Please Fill required Details');
        return;
    }

    PostQuery(Type, Name, Email, PhoneNo, CourseCode, City, Course);
    $('#txtNameP').val('');
    $('#txtEmailP').val('');
    $('#txtPhoneP').val('');
    $('#txtCityP').val('');
    GetCourseListP();
    $('#AdmissionForm').hide();
    $('body').removeClass('modal-open');
    $('.modal-backdrop').remove();
}


function SubmitQuery2() {
    var Type = 'Admission Form';
    var Name = $('#exampleInputFullName').val();
    var Email = $('#exampleInputEmail1').val();
    var PhoneNo = $('#exampleInputPhone1').val();
    var CourseCode = $("#ddlHomePageCourseP option:selected").val();
    var Course = $("#ddlHomePageCourseP option:selected").text();

    if (Name == '' || PhoneNo == '' || CourseCode == '0') {
        alert('Please Fill required Details');
        return;
    }

    PostQuery2(Type, Name, Email, PhoneNo, CourseCode, Course);
    $('#exampleInputFullName').val('');
    $('#exampleInputEmail1').val('');
    $('#exampleInputPhone1').val('');
    GetCourseListP();
}

function PostQuery2(Type, Name, Email, PhoneNo, CourseCode, Course) {
    var data = data = {
        'QueryType': Type,
        'Name': Name,
        'Email': Email,
        'PhoneNo': PhoneNo,
        'CourseCode': CourseCode,
        'Course': Course
    };
    console.log(data);
    $.ajax({
        url: "DataService.asmx/InsertQuery",
        type: "POST",
        contentType: "application/json",
        dataType: "json",
        data: JSON.stringify({
            'Query': JSON.stringify(data)
        }),
        success: function(data) {
            var Result = '';
            $.each(JSON.parse(data.d), function() {
                Result = this.Result;
            });
            alert(Result);
        }
    });
}



function PostQuery(Type, Name, Email, PhoneNo, CourseCode, City, Course) {
    var data = data = {
        'QueryType': Type,
        'Name': Name,
        'Email': Email,
        'PhoneNo': PhoneNo,
        'CourseCode': CourseCode,
        'City': City,
        'Course': Course
    };
    console.log(data);
    $.ajax({
        url: "DataService.asmx/InsertQuery",
        type: "POST",
        contentType: "application/json",
        dataType: "json",
        data: JSON.stringify({
            'Query': JSON.stringify(data)
        }),
        success: function(data) {
            var Result = '';
            $.each(JSON.parse(data.d), function() {
                Result = this.Result;
            });
            alert(Result);
            $('#exampleModal').modal('hide');
        }
    });
}

function GetCourseListP() {
    $.ajax({
        url: "DataService.asmx/GetCourseList",
        type: "POST",
        contentType: "application/json",
        dataType: "json",
        success: function(data) {
            $('#ddlCourseP').empty();
            $('#ddlCourseP').append('<option value="0">Select Course</option>');
            $('#ddlHomePageCourseP').empty();
            $('#ddlHomePageCourseP').append('<option value="0">Select Course</option>');

            $.each(JSON.parse(data.d), function() {
                $('#ddlCourseP').append('<option value="' + this.CourseCode + '">' + this.CourseOutside + '</option>');
                $('#ddlHomePageCourseP').append('<option value="' + this.CourseCode + '">' + this.CourseOutside + '</option>');
            });
        }
    });
}

function SubmitQueryInnerPage() {
    var Type = 'QueryWebsiteInnerPage';
    var Name = $('#txtName').val();
    var PhoneNo = $('#txtMobileNo').val();
    var CourseCode = $("#ddlCourseInnerPage option:selected").val();
    var Course = $("#ddlCourseInnerPage option:selected").text();
    var Stream = $("#ddlStream option:selected").val();
    if (Name == '' || PhoneNo == '' || CourseCode == '0') {
        alert('Please Fill required Details');
        return;
    }

    PostQueryInnerPage(Type, Name, PhoneNo, CourseCode, Stream, Course);

    $('#txtName').val('');
    $('#txtMobileNo').val('');
    $('#txtCityP').val('');
    GetCourseListInnerPage();
}

function PostQueryInnerPage(Type, Name, PhoneNo, CourseCode, Stream, Course) {
    var data = {
        'QueryType': Type,
        'Name': Name,
        'PhoneNo': PhoneNo,
        'CourseCode': CourseCode,
        'Stream': Stream,
        'Course': Course
    };

    console.log(data);
    $.ajax({
        url: "DataService.asmx/InsertQuery",
        type: "POST",
        contentType: "application/json",
        dataType: "json",
        data: JSON.stringify({
            'Query': JSON.stringify(data)
        }),
        success: function(data) {
            var Result = '';
            $.each(JSON.parse(data.d), function() {
                Result = this.Result;
            });
            alert(Result);
            $('#exampleModal').modal('hide');
        }
    });
}

function GetCourseListInnerPage() {
    //$.ajax({
    //    url: "DataService.asmx/GetCourseList",
    //    type: "POST",
    //    contentType: "application/json",
    //    dataType: "json",
    //    success: function (data) {
    //        $('#ddlCourseInnerPage').empty();
    //        $('#ddlCourseInnerPage').append('<option value="0">Select Course</option>');
    //        $.each(JSON.parse(data.d), function () {
    //            $('#ddlCourseInnerPage').append('<option value="' + this.CourseCode + '">' + this.CourseOutside + '</option>');
    //        });
    //    }
    //});
    $('#ddlCourseInnerPage').empty();
    $('#ddlCourseInnerPage').append('<option value="0">Select Course</option>');
    if ($("#ddlStream option:selected").val() == 'UG') {
        $('#ddlCourseInnerPage').append('<option value="3">B.Com</option><option value="4">B.Ed</option><option value="7">B.FAD</option><option value="5">B.Tech</option><option value="1">BBA</option><option value="2">BCA</option><option value="6">BFA</option><option value="8">BJMC</option>');
    } else if ($("#ddlStream option:selected").val() == 'PG') {
        $('#ddlCourseInnerPage').append('<option value="12">M.Tech</option><option value="9">MBA</option><option value="11">MBA (Elite)</option><option value="10">PGDM</option><option value="17">PGDM with Certificate</option>');
    } else if ($("#ddlStream option:selected").val() == 'Diploma') {
        $('#ddlCourseInnerPage').append('<option value="14">D.El.Ed</option><option value="15">DFD</option><option value="13">Poly </option></select>');
    }

}