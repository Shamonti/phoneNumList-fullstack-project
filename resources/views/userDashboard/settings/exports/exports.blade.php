@extends('userDashboard.settings.master')

@section('main')
    <!-- START BILLING -->
    <section class="section-main">
        <!-- START SECOND NAVBAR -->
        <section class="second-navbar">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="{{ route('exports') }}" class="nav-link {{  request()->routeIs('exports') ? 'active' : '' }}">CSV Exports</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('csv-export-settings') }}" class="nav-link{{  request()->routeIs('csv-export-settings') ? 'active' : '' }}"
                    >CSV Export Settings</a>
                </li>
            </ul>
        </section>
        <!-- END SECOND NAVBAR -->

        <!-- START NO EXPORT -->
        <section class="pt-5 ps-3 section-no-export d-none">
            <span class="text-secondary">No CSV exports found!</span>
        </section>
        <!-- END NO EXPORT -->

        <!-- START CSV EXPORTS TABLE -->
        <section class="section-csv-exports-table m-3 border rounded table-scrollable">
            <table class="table" style="height: 85vh;">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Progress</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Total Records</th>
                    <th>Exported By</th>
                </tr>
                </thead>
                <tbody>
                @foreach($exportHistory as $export)
                    <tr onclick="window.location='{{ route('reDownloadFile',$export->id) }}'">
                        <td scope="row">
                            <div>
                                Export of contacts
                            </div>
                            <div class="fs-5 text-secondary">
                                Created on
                                <span>{{ \Carbon\Carbon::parse($export->createdOn)->format('M') }}
                                    {{ \Carbon\Carbon::parse($export->createdOn)->format('d') }}
                                    {{--{{ \Carbon\Carbon::parse($export->createdOn)->format('Y') }}--}}</span>
                            </div>
                            </p>
                        </td>
                        <td colspan="8">
                            <div class="progress my-auto">
                                <div
                                        class="progress-bar"
                                        role="progressbar"
                                        style="width: 100%"
                                        aria-valuenow="100"
                                        aria-valuemin="0"
                                        aria-valuemax="100"
                                ></div>
                            </div>
                        </td>
                        <td>{{ $export->record }}</td>
                        <td>
                            <button
                                    type="button"
                                    class="user user-btn circle-element mx-3"
                            >
                                <p class="user-name">{{ $firstStringCharacter = substr(Auth::user()->firstName, 0, 1) }}{{ $firstStringCharacter = substr(Auth::user()->lastName, 0, 1) }}</p>
                                <div class="user-details bg-dark py-2 px-5">
                                    <p>
                                        Export started by {{ Auth::user()->firstName }} {{ Auth::user()->lastName }}
                                    </p>
                                    <p>
                                        &lt;{{ Auth::user()->email }}&gt;
                                    </p>
                                </div>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td class="d-flex align-items-center">
                        <!-- START PAGINATION -->
                        <div class="row py-2">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item">
                                        <div class="d-sm-inline-flex justify-content-center">
                                            {!! $exportHistory->links() !!}
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- END PAGINATION -->
                    </td>
                </tr>
                </tfoot>
            </table>
        </section>
        <!-- END CSV EXPORTS TABLE -->
    </section>
    <!-- END MAIN -->
@endsection
