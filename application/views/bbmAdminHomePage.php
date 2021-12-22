<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
    <link href="<?php echo base_url(); ?>/assets/css/sideNav.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/profilecard.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1"><img src="<?php echo base_url(); ?>/assets/img/testlogo.jpg" alt="My Logo" height="28">Future Planet
                </span>
        </div>
    </nav>

    <!-- Side Nav start -->
    <div class="sidenav">
        <!-- Profile card -->

        <div class="container mb-4 d-flex justify-content-center ">
            <div class="card profileAppendableDiv">
               
            </div>
        </div>

        <a href="#" id="homePage">HomePage</a>
        <a href="#" id="about">Members</a>
        <a href="#" id="services">Services</a>
        <a href="#" id="tender">Tender</a>
        <a href="#" id="profile">My Profile</a>
    </div>

    <!-- Body -->
    <div class="main">
        <div class="container">
            <form id="idForm" action="" >
                <div id="adminForm"></div>
            </form>
            <div class="tableDiv" style="margin-top: 10px;">
                 <table class="table table-responsive table-bordered" id="tableId">
                    <thead id="tableHeader">
                       
                    </thead>
                    <tbody id="tableBody">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    

 <script type="text/javascript">
var base_url = '<?php echo base_url(); ?>';
var formName = '';
var obj = {
     'homePage': [
        { "label": "Title","id": "homePageId","name":"title" ,"type": "text", "placeholder": "Please enter title" },
        { "label": "Heading Text", "id": "heading", "name": "heading","type": "text", "placeholder": "Please enter heading" },
        { "label": "Sub Heading Text", "id": "sub_heading", "name": "sub_heading","type": "text", "placeholder": "Please enter Sub heading" },
        { "label": "Image", "id": "home_image", "name": "home_image","type": "file", "placeholder": "Please select Image" }
       
    ],
    'services': [
        { "label": "Services Title","id": "serviceTitle","name":"service_title" ,"type": "text", "placeholder": "Please enter title" },
        { "label": "Short Description", "id": "serviceShortDesc", "name": "short_desc","type": "text", "placeholder": "Please enter short description" }
       
    ],
    'about': [
        { "label": "Name", "id": "member_name", "name": "member_name","type": "text", "placeholder": "Please enter your name" },
        { "label": "Profile Name", "id": "profile", "name": "profile", "type": "text", "placeholder": "Please enter your profile" },
        { "label": "Description", "id": "about_desc", "type": "text", "name": "about_Desc", "placeholder": "Please enter something about you" },
        { "label": "Profile Picture", "id": "member_image", "type": "file", "name": "member_image", "placeholder": "select your members profile pic..." }
    ],
    'tender': [
        { "label": "Tender Name", "id": "tender_name", "name": "title","type": "text", "placeholder": "Please enter tender name" },
        { "label": "Description", "id": "tender_desc", "type": "text", "name": "Description", "placeholder": "Please enter something about your Tender" },
        { "label": "Picture", "id": "member_image", "type": "file", "name": "image_path", "placeholder": "select your tender profile pic..." }
    ],
     'profile': [
        { "label": "Name", "id": "profile", "name": "profile_name","type": "text", "placeholder": "Please enter your name" },
        { "label": "Mail Id", "id": "mailId", "type": "text", "name": "mailId", "placeholder": "Please enter  your mail id" },
         { "label": "Contact Number", "id": "contact", "type": "number", "name": "contact_number", "placeholder": "Please enter  your contact number" },
        { "label": "Picture", "id": "member_image", "type": "file", "name": "image_path", "placeholder": "select your  profile pic..." }
    ]
};
$("#services").click(function () {
    createFields('services');
});
$("#about").click(function () {
    createFields('about');
});
$("#homePage").click(function () {
    createFields('homePage');
});
$("#tender").click(function () {
    createFields('tender');
});
$("#profile").click(function () {
    createFields('profile');
});

$(Document).ready(function(){
    $(".tableDiv").hide();
     $.ajax({
        url: './getProfileData',
        type: 'POST',
        success: function (data) {
            var profileDivTag = '<div class="image d-flex flex-column justify-content-center align-items-center ">'+
                   ' <button class="btn btn-secondary mt-3 profileImage" style="background:black;">'+ 
                        '<img src="'+base_url+'/assets/img/team/'+data.image_path+'" height="60" width="100" />'+
                   ' </button>'+
                   ' <span class="name mt-3" id="profileName">'+data.profile_name+'</span>'+
                   ' <span class="idd" >'+
                   '<span>'+
                  ' <i class="fa fa-envelope"></i>'+
                   '</span id="myMailId">'+data.mailId+'</span>'+
                    '<div class="d-flex flex-row justify-content-center align-items-center gap-2">'+ 
                    '<span class="idd1"></span><i class="fa fa-phone"></i>'+
                    '<span id="phone_number" class="phone_number">'+data.contact_number+'</span>'+ 
                    '</div>'+
                '</div>'

            $(".profileAppendableDiv").append(profileDivTag);
           
        }
    })
})
function createFields(tabName) {
    $(".tableDiv").show();
    getSpecificData(tabName);
    formName = tabName;
    var html = '';
    $('#adminForm').empty();
    for (const property in obj[tabName]) {
        html += '<div class="mb-3 mt-3">';
        html += '<label for="' + obj[tabName][property].id + '" class="form-label">' + obj[tabName][property].label + ':</label>';
        html += '<input type="' + obj[tabName][property].type + '" name="'+obj[tabName][property].name+'" class="form-control" id="' + obj[tabName][property].id + '" placeholder="' + obj[tabName][property].placeholder + '">';
        html += '</div>';
       // console.log(`${property}: ${obj[tabName][property].type}`);
    }
    html += '<button type="submit" class="btn btn-primary"  id="submitBtn">Submit</button>';
    $('#adminForm').append(html);
}

$("form#idForm").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);
    formData.append('formName',formName);
    $.ajax({
        url: './uploadAdminsInfo',
        type: 'POST',
        cache: false,
        contentType: false,
        processData: false,
        enctype: 'multipart/form-data',
        data: formData,
        success: function (data) {
            alert(data)
        },

    });
});

function getSpecificData(tabName){
   
    $.ajax({
        url: './getSpecificData',
        type: 'POST',
        data: {tabName:tabName},
        success: function (data) {
            var tag = '' , i = 1,thData='';
           if(tabName=='services'){
                thData += '<th>Si.N0</th>';
                thData += '<th width="400">Title</th>';
                thData += '<th width="600">Short Desc</th>';
               // thData += '<th>Image</th>';
                thData += '<th>Action</th>';
                $.each(data.resultData,function(key,val){
                  
                    tag += '<tr>'+
                                '<td>'+i+'</td>'+
                                '<td>'+val.service_title+'</td>'+
                                '<td>'+val.short_desc+'</td>'+
                                //'<td><img  src="./assets/img/tenders/'+val.image_path+'" class="img-responsive" alt="portfolio-image"></td>'+
                                '<td><a href="#" onClick="deleteData('+val.id+',\'' +tabName+ '\');" class="btn btn-sm btn-info">Delete</a></td>'+
                            '</td>';
                            i++;
                })
                $("#tableHeader").children().remove();
                $("#tableBody").children().remove();
                $("#tableHeader").append(thData);
                $("#tableBody").append(tag);
               // $("#tableId").dataTable();
            }

            if(tabName=='homePage'){
                thData += '<th>Si.N0</th>';
                thData += '<th width="400">Title</th>';
                thData += '<th width="600">Heading</th>';
                thData += '<th width="600">Sub Heading</th>';
                thData += '<th>Image</th>';
                thData += '<th>Action</th>';
                $.each(data.resultData,function(key,val){
                    //alert(val.service_title)<img  src="./assets/img/tenders/'+val.image_path+'" class="img-responsive" alt="portfolio-image">
                    tag += '<tr>'+
                                '<td>'+i+'</td>'+
                                '<td>'+val.title+'</td>'+
                                '<td>'+val.heading+'</td>'+
                                '<td>'+val.sub_heading+'</td>'+
                                '<td><img height="100" width="100" src="'+base_url+'/assets/img/homePage/'+val.home_image+'" class="img-responsive" alt="portfolio-image"></td>'+
                                '<td><a href="#" onClick="deleteData('+val.id+',\'' +tabName+ '\');" class="btn btn-sm btn-info">Delete</a></td>'+
                            '</td>';
                            i++;
                })
                $("#tableHeader").children().remove();
                $("#tableBody").children().remove();
                $("#tableHeader").append(thData);
                $("#tableBody").append(tag);
               // $("#tableId").dataTable();
            }

            if(tabName=='about'){
                thData += '<th>Si.N0</th>';
                thData += '<th width="400">Name</th>';
                thData += '<th width="600">Profile</th>';
                thData += '<th width="600">Description</th>';
                thData += '<th>Image</th>';
                thData += '<th>Action</th>';
                $.each(data.resultData,function(key,val){
                    tag += '<tr>'+
                                '<td>'+i+'</td>'+
                                '<td>'+val.member_name+'</td>'+
                                '<td>'+val.profile+'</td>'+
                                '<td>'+val.about_Desc+'</td>'+
                                '<td><img height="100" width="100" src="'+base_url+'/assets/img/team/'+val.member_image+'" class="img-responsive" alt="portfolio-image"></td>'+
                                '<td><a href="#" onClick="deleteData('+val.id+',\'' +tabName+ '\');" class="btn btn-sm btn-info">Delete</a></td>'+
                            '</td>';
                            i++;
                })
                $("#tableHeader").children().remove();
                $("#tableBody").children().remove();
                $("#tableHeader").append(thData);
                $("#tableBody").append(tag);
               // $("#tableId").dataTable();
            }
            if(tabName=='tender'){
                thData += '<th>Si.N0</th>';
                thData += '<th width="400">Tender Name</th>';
                thData += '<th width="600">Description</th>';
                thData += '<th>Image</th>';
                thData += '<th>Action</th>';
                $.each(data.resultData,function(key,val){
                    tag += '<tr>'+
                                '<td>'+i+'</td>'+
                                '<td>'+val.title+'</td>'+
                                '<td>'+val.Description+'</td>'+
                                '<td><img height="100" width="100" src="'+base_url+'/assets/img/tenders/'+val.image_path+'" class="img-responsive" alt="portfolio-image"></td>'+
                                '<td><a href="#" onClick="deleteData('+val.id+',\'' +tabName+ '\');" class="btn btn-sm btn-info">Delete</a></td>'+
                            '</td>';
                            i++;
                })
                $("#tableHeader").children().remove();
                $("#tableBody").children().remove();
                $("#tableHeader").append(thData);
                $("#tableBody").append(tag);
               // $("#tableId").dataTable();
            }
            if(tabName=='profile'){
                thData += '<th>Si.N0</th>';
                thData += '<th width="400"> Name</th>';
                thData += '<th width="600">mail Id</th>';
                thData += '<th>contact</th>';
                thData += '<th>Image</th>';
                thData += '<th>Action</th>';
                $.each(data.resultData,function(key,val){
                    tag += '<tr>'+
                                '<td>'+i+'</td>'+
                                '<td>'+val.profile_name+'</td>'+
                                '<td>'+val.mailId+'</td>'+
                                '<td>'+val.contact_number+'</td>'+
                                '<td><img height="100" width="100" src="'+base_url+'/assets/img/team/'+val.image_path+'" class="img-responsive" alt="portfolio-image"></td>'+
                                '<td><a href="#" onClick="deleteData('+val.id+',\'' +tabName+ '\');" class="btn btn-sm btn-info">Delete</a></td>'+
                            '</td>';
                            i++;
                })
                $("#tableHeader").children().remove();
                $("#tableBody").children().remove();
                $("#tableHeader").append(thData);
                $("#tableBody").append(tag);
               // $("#tableId").dataTable();
            }
        }

        

    });
}

function deleteData(id,tabName){
    alert(id+'--'+tabName)
    if(confirm("Are you sure you want to delete this item")){
        $.ajax({
            url: './deleteParticularFormData',
            type: 'POST',
            data: {
                tabName:formName,
                id:id
            },
            success : function(data){
                alert("Item Deleted Successfully")
            }
        });
    }
}

</script>
</body>

</html>