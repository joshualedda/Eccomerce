
<div wire:ignore.self class="modal fade" id="addBrandModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form wire:submit.prevent="storeBrand">

                <div class="mb-3">
                    <label for="">Select Category</label>
                    <select resetInput wire:model.defer="category_id" required class="form-control">
                        <option value="">--Select Category--</option>
                        @foreach ($categories as $category )
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('category_id') <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Brand Name</label>
                    <input type="text" resetInput wire:model.defer="name" class="form-control">
                    @error('name') <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Brand Slug</label>
                    <input type="text" resetInput wire:model.defer="slug" class="form-control">
                    @error('slug') <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Status</label>
                 <input type="checkbox" resetInput wire:model.defer="status"/> Checked = hidden, Un-Cheked = Visible
                 @error('status') <small class="text-danger">{{ $message}}</small>
                 @enderror
                </div>

              </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
      </div>
    </div>
  </div>

{{--Update --}}
  <div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form wire:submit.prevent="updateBrand">

                <div class="mb-3">
                    <label for="">Select Category</label>
                    <select wire:model.defer="category_id" required class="form-control">
                        <option value="">--Select Category--</option>
                        @foreach ($categories as $category )
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('category_id') <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Brand Name</label>
                    <input type="text" wire:model.defer="name" class="form-control">
                    @error('name') <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Brand Slug</label>
                    <input type="text"  wire:model.defer="slug" class="form-control">
                    @error('slug') <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Status</label>
                 <input type="checkbox"  wire:model.defer="status"/> Checked = hidden, Un-Cheked = Visible
                 @error('status') <small class="text-danger">{{ $message}}</small>
                 @enderror
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </form>
    </div>
  </div>


  {{-- Delete --}}
  <div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form wire:submit.prevent="destroyBrand">
                <div class="modal-body">
            <p>Confirm Delete?</p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Delete</button>
        </div>

      </div>

    </div>   </form>
  </div>
