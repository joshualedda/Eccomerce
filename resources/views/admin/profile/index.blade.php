@extends('layouts.admin')
@section('content')


        <section>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">


                        <div class="card-body text-center">
                          <h5 class="my-3">{{ $user->name }}</h5>
                          <p class="text-muted mb-1">
                            {{ $user->role_as == 1 ? 'Admin' : 'User' }}
                        </p>

                        </div>
                    </div>


                    {{-- Commented for the meantime --}}
                    {{-- <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <p class="pt-4 px-4 fw-bold text-primary">Research List</p>
                                <li class="list-group-item d-flex px-4 py-3">
                                    <div class="w-50">
                                        <p class="mb-0"><strong>Name</strong></p>
                                    </div>
                                    <div class="w-50">
                                        <p class="mb-0"><strong>Status</strong></p>
                                    </div>
                                </li>
                                {{-- <?php if (!empty($researches)) : ?>
                                    <?php foreach ($researches as $research) : ?>
                                        <li class="list-group-item d-flex px-4 py-3">
                                            <div class="w-50">
                                                <i class="fas fa-globe fa-lg text-warning"></i>
                                                <p class="mb-0"><?= htmlspecialchars($research['research_title']); ?></p>
                                            </div>
                                            <div class="w-50">
                                                <p class="mb-0"><?= htmlspecialchars($research['status']); ?></p>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <li class="list-group-item d-flex px-4 py-3">
                                        <p class="mb-0">No research records found.</p>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
--}}




                </div>


                <div class="col-lg-8">

                    <div class="card mb-4" id="first">



                        <div class="card-body">
                            <div id="success-alert" class="alert alert-success" role="alert" style="display: none;">
                                Successfully Updated
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0" id="userName">{{ $user->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0" id="userEmail">{{ $user->email }}</p>
                                </div>
                            </div>
                            <hr>                           <div class="d-flex justify-content-end">
                                <button class="btn btn-success" id="editButton" type="button">Edit</button>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4" id="hidden" style="display:none;">

                        <div class="card-body">

                            <div id="danger-alert" class="alert alert-danger" role="alert" style="display: none;"></div>



                            <form id="profileForm" action="" method="POST">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">First Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="first_name" class="form-control" value="">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Last Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="last_name" class="form-control" value="">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">DMMMSU Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control" value="">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Employee No.</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="number" name="employee_no" class="form-control" value="">
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Password</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Institution</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Department</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-primary mx-2" id="backButton" type="button">Back</button>
                                    <button class="btn btn-success" id="saveButton" type="submit">Save</button>
                                </div>

                            </form>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4 text-primary font-italic me-1">Eccomerce Status
                                    </p>
                                    <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                    <div class="progress rounded mb-2" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4 text-primary font-italic me-1">Project Status
                                    </p>
                                    <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                    <div class="progress rounded mb-2" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </section>


    </div>
</div>

<!-- In developmenmt -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#editButton').on('click', function() {
            $('#first').hide();
            $('#hidden').show();
        });

        $('#backButton').on('click', function() {
            $('#first').show();
            $('#hidden').hide();
        });

        $('#profileForm').on('submit', function(e) {
            e.preventDefault();

            var form = $(this);
            var actionUrl = form.attr('action');

            $.ajax({
                url: actionUrl,
                type: 'POST',
                data: form.serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        // Update user details
                        $('#userName').text(response.data.first_name + ' ' + response.data.last_name);
                        $('#userEmail').text(response.data.email);

                        // Show and hide the success alert
                        $('#success-alert').show();
                        setTimeout(function() {
                            $('#success-alert').fadeOut();
                        }, 3000); // Hide alert after 3 seconds

                        // Toggle forms
                        $('#first').show();
                        $('#hidden').hide();

                        // Hide any previously shown danger alert
                        $('#danger-alert').hide();
                    } else {
                        // Show the error message with HTML content
                        $('#danger-alert').html(response.message).show();
                        setTimeout(function() {
                            $('#danger-alert').fadeOut();
                        }, 3000); // Hide alert after 3 seconds
                    }
                },
                error: function(xhr, status, error) {
                    // Debugging: Log the actual error
                    console.log("Ajax error:", xhr.responseText);
                }
            });
        });
    });
</script>


@endsection
