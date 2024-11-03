
<div>
@include('livewire.admin.brand.modal')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <a href="" data-bs-toggle="modal" data-bs-target="#addBrandModal" class="btn btn-sm btn-dark float-end" resetInput> Add</a>
                    </h4>
                </div>

                <div class="card-body">
                                   <table class="datatable table table-bordered table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand )
                        <tr>
                    <th>{{ $brand->id }}</th>
                    @if($brand->category)
                    <th>
                        {{ $brand->category->name}}
                    @endif
                </th>
                    <th>{{ $brand->name}}</th>
                    <th>{{ $brand->slug}}</th>
                    <th>{{ $brand->status == '1' ? 'hidden':'visible'}}</th>
                    <th>
                        <a href="#" wire:click="editBrand({{$brand->id}})" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#updateBrandModal" > Update</a>
                        <a href="#" wire:click="deleteBrand({{$brand->id}})" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#deleteBrandModal">Delete</a>
                    </th>
                </tr>
                            @empty
                            <td colspan="5">No Brands Found</td>
                            @endforelse
                        </tbody>
                    </table>

                </div>
                {{ $brands->links() }}
            </div>
        </div>
    </div>
</div>

</div>


@push('script')

<script>
window.addEventListener('close-modal', event => {
$('#addBrandModal').modal('hide');
$('#updateBrandModal').modal('hide');
$('#deleteBrandModal').modal('hide');


});
</script>

@endpush
