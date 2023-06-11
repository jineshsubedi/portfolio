<x-app-layout>
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Portfolio') }}
                </h2>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.portfolio.index') }}">Portfolio</a></li>
                    <li class="breadcrumb-item active">Index</li>
                </ol>
            </div><!-- /.col -->
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="card-header">
                <h5 class="card-title">Portfolio</h5>
                <div class="card-tools">
                    <a href="{{ route('admin.portfolio.create') }}" class="btn btn-sm btn-primary"> Add Portfolio</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>STATUS</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($portfolios as $portfolio)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $portfolio->name }}</td>
                                <td>{{ $portfolio->email }}</td>
                                <td>{{ $portfolio->status == 1 ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <form action="{{ route('admin.portfolio.destroy', $portfolio->id) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('admin.portfolio.edit', $portfolio->id) }}"
                                            class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Are You Sure?')"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No Record Found!</td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6" class="text-right">
                                {{ $portfolios->links() }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
