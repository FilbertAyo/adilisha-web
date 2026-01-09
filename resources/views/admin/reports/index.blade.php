<x-app-layout>
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="mb-0">Reports & Documents Management</h5>
                    <p class="text-muted mb-0">Manage annual reports, documents, and publications</p>
                </div>
                <a href="{{ route('admin.reports.create') }}" class="btn btn-primary">
                    <i class="ti ti-plus me-1"></i> Upload New Report
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="reportsTable">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">ID</th>
                                    <th style="width: 25%;">Title</th>
                                    <th style="width: 10%;">Category</th>
                                    <th style="width: 8%;">Year</th>
                                    <th style="width: 10%;">File Size</th>
                                    <th style="width: 10%;">Downloads</th>
                                    <th style="width: 8%;">Featured</th>
                                    <th style="width: 12%;">Published</th>
                                    <th style="width: 12%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($reports as $report)
                                    <tr>
                                        <td>{{ $report->id }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if($report->thumbnail_path)
                                                    <img src="{{ asset('storage/' . $report->thumbnail_path) }}" 
                                                         alt="{{ $report->title }}" 
                                                         style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px; margin-right: 12px;">
                                                @else
                                                    <i class="ti ti-file-type-pdf text-danger me-2" style="font-size: 24px;"></i>
                                                @endif
                                                <div>
                                                    <strong>{{ $report->title }}</strong>
                                                    @if($report->description)
                                                        <br><small class="text-muted">{{ Str::limit($report->description, 50) }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-info">{{ ucfirst($report->category) }}</span>
                                        </td>
                                        <td>{{ $report->year ?? 'N/A' }}</td>
                                        <td>{{ $report->file_size }}</td>
                                        <td>
                                            <span class="badge bg-secondary">{{ $report->download_count }}</span>
                                        </td>
                                        <td>
                                            @if($report->is_featured)
                                                <span class="badge bg-warning">Featured</span>
                                            @else
                                                <span class="badge bg-light text-dark">No</span>
                                            @endif
                                        </td>
                                        <td>{{ $report->published_date ? $report->published_date->format('M d, Y') : 'N/A' }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ asset('storage/' . $report->file_path) }}" 
                                                   target="_blank"
                                                   class="btn btn-sm btn-success" 
                                                   title="View PDF">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.reports.edit', $report->id) }}" 
                                                   class="btn btn-sm btn-info" 
                                                   title="Edit">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                                <button type="button" 
                                                        class="btn btn-sm btn-danger" 
                                                        onclick="confirmDelete({{ $report->id }}, '{{ $report->title }}')"
                                                        title="Delete">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No reports found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($reports->hasPages())
                        <div class="mt-3">
                            {{ $reports->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete <strong id="deleteReportTitle"></strong>?</p>
                    <p class="text-danger">This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function confirmDelete(reportId, reportTitle) {
            document.getElementById('deleteReportTitle').textContent = reportTitle;
            document.getElementById('deleteForm').action = `/admin/reports/${reportId}`;
            new bootstrap.Modal(document.getElementById('deleteModal')).show();
        }

        // Initialize DataTable if available
        $(document).ready(function() {
            if ($.fn.DataTable) {
                $('#reportsTable').DataTable({
                    pageLength: 10,
                    order: [[0, 'desc']],
                    columnDefs: [
                        { orderable: false, targets: -1 }
                    ]
                });
            }
        });
    </script>
    @endpush
</x-app-layout>

