<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<!-- feather icon js-->
<script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
<!-- scrollbar js-->
<script src="{{ asset('assets/js/scrollbar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/scrollbar/custom.js') }}"></script>
<!-- Sidebar jquery-->
<script src="{{ asset('assets/js/config.js') }}"></script>
<script src="{{ asset('assets/js/modalpage/custom-modal.js') }}"></script>
<!-- Plugins JS start-->
<script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>

<!-- tooltip JS Ends-->
<script src="{{ asset('assets/js/tooltip-init.js') }}"></script>

<script src="{{ asset('assets/js/script.js') }}"></script>

@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        });
    </script>
@endif

@if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        });
    </script>
@endif

<td class="flex gap-4 items-center" x-data="{ approveOpen: false, rejectOpen: false }">
    {{-- Download --}}
    <a href="{{ route('training-forms.download', ['id' => $trainingForm->id, 'user_id' => $form->user_id]) }}"
        title="Download">
        <i data-feather="download" class="text-blue-500"></i>
    </a>

    {{-- Approve --}}
    <button type="button" @click="approveOpen = true" title="Approve">
        <i data-feather="check" class="text-green-500"></i>
    </button>

    {{-- Reject --}}
    <button type="button" @click="rejectOpen = true" title="Reject">
        <i data-feather="x-circle" class="text-red-500"></i>
    </button>

    <!-- Approve Modal -->
    <div x-show="approveOpen" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-lg font-semibold mb-4">Approve
                Application</h2>
            <form action="{{ route('training-form.approve', $form->id) }}" method="POST">
                @csrf
                <textarea name="remarks" rows="3" class="w-full border rounded p-2 mb-4" placeholder="Remarks (optional)"></textarea>
                <div class="flex justify-end gap-3">
                    <button type="button" @click="approveOpen = false"
                        class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Approve</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Reject Modal -->
    <div x-show="rejectOpen" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-lg font-semibold mb-4">Reject
                Application</h2>
            <form action="{{ route('training-form.reject', $form->id) }}" method="POST">
                @csrf
                <textarea name="remarks" rows="3" class="w-full border rounded p-2 mb-4" placeholder="Reason for rejection"
                    required></textarea>
                <div class="flex justify-end gap-3">
                    <button type="button" @click="rejectOpen = false"
                        class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded">Reject</button>
                </div>
            </form>
        </div>
    </div>
</td>
