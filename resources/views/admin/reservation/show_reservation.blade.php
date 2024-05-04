<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body class="g-sidenav-show   bg-gray-100">

    @include('admin.sidebar')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('admin.navbar')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Reservations</h6>
                        </div>

                        <div class="container mt-5 d-flex justify-content-end" >
                            <form id="filterForm" action="/admin/filter_reservation" method="GET">
                                <div class="form-group">
                                    <label for="filterSelect">Filter date:</label>
                                    <select class="form-select" id="filterSelect" name="filter" style="width: 170px">
                                        <option value="all_reservations" selected>All Reservations</option>
                                        <option value="today" {{ request('filter') === 'today' ? 'selected' : '' }}>Today</option>
                                        <option value="tomorrow" {{ request('filter') === 'tomorrow' ? 'selected' : '' }}>Tomorrow</option>
                                        <option value="after_a_week" {{ request('filter') === 'after_a_week' ? 'selected' : '' }}>After a Week</option>
                                        <option value="after_a_month" {{ request('filter') === 'after_a_month' ? 'selected' : '' }}>After a Month</option>
                                        <option value="yesterday" {{ request('filter') === 'yesterday' ? 'selected' : '' }}>Yesterday</option>
                                        <option value="before_a_week" {{ request('filter') === 'before_a_week' ? 'selected' : '' }}>Before a Week</option>
                                    </select>
                                </div>
                            </form>
                        </div>


                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr class="text-center">

                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Confirmation
                                        </th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Name
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Phone
                                            </th>

                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Reservation date
                                        </th>

                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                            Email
                                        </th>

                                        <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                        Time
                                    </th>


                                    <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                    Number of persons
                                </th>

                                <th
                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                Comments
                            </th>


                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($reservation as $data)
                                            <tr class="text-center">

                                                <tr class="text-center">
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            @if ($data->confirmation === 0)
                                                                <form action="{{ route('update-status', ['id' => $data->id]) }}" method="POST">
                                                                    @csrf
                                                                    <button type="submit" name="conf" value="0" class="btn btn-danger btn-sm" disabled>
                                                                        <i class="bi bi-x" style="font-size: 1rem;"></i>
                                                                    </button>
                                                                </form>
                                                            @elseif ($data->confirmation === 1)
                                                                <form action="{{ route('update-status', ['id' => $data->id]) }}" method="POST">
                                                                    @csrf
                                                                    <button type="submit" name="conf" value="1" class="btn btn-success btn-sm me-1" disabled>
                                                                        <i class="bi bi-check" style="font-size: 1rem;"></i>
                                                                    </button>
                                                                </form>
                                                            @else
                                                                <form action="{{ route('update-status', ['id' => $data->id]) }}" method="POST">
                                                                    @csrf
                                                                    <button type="submit" name="conf" value="1" class="btn btn-success btn-sm me-1">
                                                                        <i class="bi bi-check" style="font-size: 1rem;"></i>
                                                                    </button>
                                                                </form>
                                                                <form action="{{ route('update-status', ['id' => $data->id]) }}" method="POST">
                                                                    @csrf
                                                                    <button type="submit" name="conf" value="0" class="btn btn-danger btn-sm">
                                                                        <i class="bi bi-x" style="font-size: 1rem;"></i>
                                                                    </button>
                                                                </form>
                                                            @endif
                                                        </div>
                                                    </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $data->name }}
                                                    </p>
                                                </td>


                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $data->phone }}
                                                    </p>
                                                </td>

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ date('l, Y-m-d', strtotime($data->reservation_day)) }}
                                                    </p>
                                                </td>


                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $data->email }}
                                                    </p>
                                                </td>

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ date('h:i A', strtotime($data->time)) }}
                                                    </p>
                                                </td>

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $data->number_of_person }}
                                                    </p>
                                                </td>

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0" style="color: {{ empty($data->comments) ? 'red' : 'inherit' }}">
                                                        {{ empty($data->comments) ? 'No Comments' : $data->comments }}
                                                    </p>
                                                </td>


                                                <td class="align-middle">
                                                    <a href="{{ url('admin/delete_reservation', $data->id) }}"
                                                        class="text-danger font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit reservation"
                                                        onclick="return confirm('Are you sure you want to delete this reservation?')">
                                                        Delete
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="16">
                                                    <p class="text-xs text-center text-danger font-weight-bold mb-0">
                                                        No Data !
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $reservation->render('admin.pagination') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.footer')
        </div>
    </main>
    <script>
        $(document).ready(function() {
            $('#filterSelect').change(function() {
                $('#filterForm').submit();
            });
        });
    </script>

    @include('admin.script')

</body>

</html>
