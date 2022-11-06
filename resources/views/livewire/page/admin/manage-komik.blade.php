   <!-- Begin Page Content -->
   <div class="container-fluid mb-5">
       <div class="card" style="border-radius: 8px; background-color: #fff;">
           <div class="row">
               <div class="col">
                   <div class="dashoard">

                       @if (session()->has('message_success'))
                           <div class="notification-feedback">
                               <div class="alert alert-success alert-dismissible fade show" role="alert"
                                   style="border-radius: 0;">
                                   {{ session()->get('message_success') }}
                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                               </div>
                           </div>
                       @endif

                       <div class="dashboard-inner">
                           <div class="dashboard-inner__text px-3 mx-2 pt-2">
                               <h4 class="text-dark text-capitalize">Manage Data Komik</h4>
                           </div>
                           <div class="dashboard-inner__addbutton  px-3  mx-2  mb-3">
                               <a href="" class="btn btn-primary">
                                   {{ __('Add New Komik') }} <span class="fas fa-plus"></span>
                               </a>
                           </div>
                       </div>
                       <div class="dashboard-inner__item">
                           <div class="dashboard-item__list">
                               <div class="row justify-content-arround align-items-center">
                                   <div class="col">
                                       <div class="table-responsive">
                                           <table class="table table-striped">
                                               <thead>
                                                   <tr>
                                                       <th scope="col">#</th>
                                                       <th scope="col-lg-6">Title</th>
                                                       <th scope="col-*">PublishAt</th>
                                                       <th scope="col-*">Action</th>
                                                   </tr>
                                               </thead>
                                               <tbody>
                                                   @forelse ($comics as $comic)
                                                       <tr>
                                                           <th scope="row" class="align-middle">
                                                               {{ ($comics->currentpage() - 1) * $comics->perpage() + $loop->index + 1 }}
                                                           </th>
                                                           <td class="align-middle font-weight-dark-500">
                                                               {{ $comic->comic_title }}
                                                           </td>
                                                           <td class="align-middle">
                                                               {{ date('m/d/Y', strtotime($comic->created_at)) }}</td>

                                                           <td>
                                                               <a href="" class="btn btn-danger"><i
                                                                       class="fas fa-trash-alt"></i></a>
                                                               <a href="" class="btn btn-danger"><i
                                                                       class="fas fa-edit"></i></a>
                                                           </td>
                                                       </tr>
                                                   @empty
                                                       <tr>
                                                           <td>
                                                               Data Not Found.
                                                           </td>
                                                       </tr>
                                                   @endforelse
                                               </tbody>
                                           </table>
                                       </div>
                                   </div>
                               </div>

                               <div class="d-flex pagination-start px-3">
                                   {{ $comics->links() }}
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>

   </div>
   <!-- /.container-fluid -->
