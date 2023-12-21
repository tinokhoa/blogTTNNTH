<style>
    button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    button:hover {
        opacity:1;
    }

    /* Float cancel and delete buttons and add an equal width */
    .cancel, .delete-btn{
        float: left;
        width: 50%;
    }

    /* Add a color to the cancel button */
    .cancel {
        background-color: #ccc;
        color: black;
    }

    /* Add a color to the delete button */
    .delete-btn{
        background-color: #f44336;
    }

    /* Add padding and center-align text to the container */
    .container {
        padding: 16px;
        text-align: center;
    }

    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        /*overflow: auto; !* Enable scroll if needed *!*/
        background-color: #474e5d;
        padding-top: 50px;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
    }

    /* Style the horizontal ruler */
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    /* The Modal Close Button (x) */
    .close {
        position: absolute;
        right: 35px;
        top: 15px;
        font-size: 40px;
        font-weight: bold;
        color: #f1f1f1;
    }

    .close:hover,
    .close:focus {
        color: #f44336;
        cursor: pointer;
    }

    /* Clear floats */
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

    /* Change styles for cancel button and delete button on extra small screens */
    @media screen and (max-width: 300px) {
        .cancelbtn, .deletebtn {
            width: 100%;
        }
    }
</style>
<div id="id01" class="modal">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
    <form class="modal-content" action="">
        @csrf
        @method('DELETE')
        <input id="id" name="id" hidden>
        <div class="container">
            <h1>Xóa thông tin</h1>
            <p>Bạn có chắc muốn xóa thông tin ?</p>
            <div class="clearfix">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancel">Hủy</button>
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="delete-btn">Xóa</button>
            </div>
        </div>
    </form>
</div>
<script>
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<script>
    $(document).on('click','.delete',function(){
        let id = $(this).attr('data-id');
        $('#id').val(id);
    });
</script>
