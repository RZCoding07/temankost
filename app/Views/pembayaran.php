<?= $this->extend("layouts/master_app") ?>

<?= $this->section("content") ?>


<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title text-capitalize">Data <?= $title ?></h4>
            <button type="button" class="btn float-end btn-primary btn-sm" onclick="save()" title="<?= lang("App.new") ?>"> <?= lang('App.new') ?></button>
        </div>
        <div class="box-body">
            <table id="data_table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>User id</th>
                        <th>Kost id</th>
                        <th>Bulan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</section>




<!-- /ADD modal content -->


<?= $this->endSection() ?>
<!-- page script -->
<?= $this->section("script") ?>
<script>
    let csrfHash = '<?= csrf_hash(); ?>'
    let csrfToken = '<?= csrf_token(); ?>'
    // dataTables
    $(function() {
        var table = $('#data_table').removeAttr('width').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "scrollY": '45vh',
            "scrollX": true,
            "scrollCollapse": false,
            "responsive": false,
            "ajax": {
                "url": '<?php echo base_url($controller . "/getAll") ?>',
                "type": "POST",
                "dataType": "json",
                "data": {
                    [csrfToken]: csrfHash
                },
                async: "true"
            }
        });
    });

    var urlController = '';
    var submitText = '';

    function getUrl() {
        return urlController;
    }

    function getSubmitText() {
        return submitText;
    }

    function save(id) {
        // reset the form 
        $("#data-form")[0].reset();
        $(".form-control").removeClass('is-invalid').removeClass('is-valid');
        if (typeof id === 'undefined' || id < 1) { //add
            urlController = '<?= base_url($controller . "/add") ?>';
            submitText = '<?= lang("App.save") ?>';
            $("#info-header-modalLabel").text('<?= lang("App.add") ?>');
            $("#form-btn").text(submitText);
            $('#data-modal').modal('show');
        } else { //edit
            urlController = '<?= base_url($controller . "/edit") ?>';
            submitText = '<?= lang("App.update") ?>';
            $.ajax({
                url: '<?= base_url($controller . "/getOne") ?>',
                type: 'post',
                data: {
                    id: id,
                    [csrfToken]: csrfHash
                },
                dataType: 'json',
                success: function(response) {
                    $("#info-header-modalLabel").text('<?= lang("App.edit") ?>');
                    $("#form-btn").text(submitText);
                    $('#data-modal').modal('show');
                    //insert data to form
                    $("#data-form #id").val(response.id);
                    $("#data-form #user_id").val(response.user_id);
                    $("#data-form #kost_id").val(response.kost_id);
                    $("#data-form #bulan").val(response.bulan);
                    $("#data-form #created_at").val(response.created_at);
                    $("#data-form #updated_at").val(response.updated_at);


                }
            });
        }
        $.validator.setDefaults({
            highlight: function(element) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid').addClass('is-valid');
            },
            errorElement: 'div ',
            errorClass: 'invalid-feedback',
            errorPlacement: function(error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else if ($(element).is('.select')) {
                    element.next().after(error);
                } else if (element.hasClass('select2')) {
                    //error.insertAfter(element);
                    error.insertAfter(element.next());
                } else if (element.hasClass('selectpicker')) {
                    error.insertAfter(element.next());
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                var form = $('#data-form');
                $(".text-danger").remove();
                $.ajax({
                    // fixBug get url from global function only
                    // get global variable is bug!
                    url: getUrl(),
                    type: 'post',
                    data: form.serialize(),
                    cache: false,
                    dataType: 'json',
                    beforeSend: function() {
                        $('#form-btn').html('<i class="fad fa-spinner fa-spin"></i>');
                    },
                    success: function(response) {
                        if (response.success === true) {
                            $('#data-modal').modal('hide');
                            Swal.fire({
                                toast: true,
                                position: 'bottom-end',
                                icon: 'success',
                                title: response.messages,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                $('#data_table').DataTable().ajax.reload(null, false).draw(false);
                            })
                        } else {
                            if (response.messages instanceof Object) {
                                $.each(response.messages, function(index, value) {
                                    var ele = $("#" + index);
                                    ele.closest('.form-control')
                                        .removeClass('is-invalid')
                                        .removeClass('is-valid')
                                        .addClass(value.length > 0 ? 'is-invalid' : 'is-valid');
                                    ele.after('<div class="invalid-feedback">' + response.messages[index] + '</div>');
                                });
                            } else {
                                Swal.fire({
                                    toast: false,
                                    position: 'bottom-end',
                                    icon: 'error',
                                    title: response.messages,
                                    showConfirmButton: false,
                                    timer: 3000
                                })

                            }
                        }
                        $('#form-btn').html(getSubmitText());
                    }
                }).fail(function(res) {
                    console.log(res);
                });
                return false;
            }
        });

        $('#data-form').validate({

            //insert data-form to database

        });
    }

    function remove(id) {
        Swal.fire({
            title: "<?= lang("App.remove-title") ?>",
            text: "<?= lang("App.remove-text") ?>",
            icon: 'warning',
            showCancelButton: true,
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            },
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '<?= lang("App.confirm") ?>',
            cancelButtonText: '<?= lang("App.cancel") ?>'
        }).then((result) => {

            if (result.value) {
                $.ajax({
                    url: '<?php echo base_url($controller . "/remove") ?>',
                    type: 'post',
                    data: {
                        id: id,
                        [csrfToken]: csrfHash
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success === true) {
                            Swal.fire({
                                toast: true,
                                position: 'bottom-end',
                                icon: 'success',
                                title: response.messages,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                $('#data_table').DataTable().ajax.reload(null, false).draw(false);
                            })
                        } else {
                            Swal.fire({
                                toast: false,
                                position: 'bottom-end',
                                icon: 'error',
                                title: response.messages,
                                showConfirmButton: false,
                                timer: 3000
                            })
                        }
                    }
                });
            }
        })
    }
</script>


<?= $this->endSection() ?>