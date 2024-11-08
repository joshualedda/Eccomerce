<div>


    {{-- Modal --}}
    <div wire:ignore.self class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Data?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyCategory">
                    <div class="modal-body">
                        Confirm
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Modal --}}

    <div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                    <h3>Category
                        <a href="{{ url('admin/category/create') }}" class="btn btn-sm btn-dark float-end">Add
                            Category</a>
                    </h3>
                </div>

                <div class="card-body">
                    <table class="datatable table table-bordered table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/category/' . $category->id . '/edit') }}"
                                            class="btn btn-sm btn-dark">Edit</a>

                                        <a href="#" wire:click="deleteCategory({{ $category->id }})"
                                            class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="">
                        {{ $categories->links() }}
                    </div>


                </div>

            </div>


        </div>
    </div>
</div>

@push('script')
    <script>
        window.addEventListener('closeModal', event => {
            $("#delete").modal('hide');
        });
    </script>
@endpush
