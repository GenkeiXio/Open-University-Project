<div class="tab-pane fade" id="news-section" role="tabpanel" aria-labelledby="news-tab">
    <section class="pt-0 pb-5">
        <div class="news-accordion-container mx-auto" id="newsAccordion"> 
            
            <div class="text-center mb-4">
                <h2 class="fw-bold text-uppercase mt-0" style="color: #333;">News & Announcements</h2>
            </div>

            {{-- debug: {{ $news->count() }} items --}}
            @forelse($news as $item)
                <div class="news-custom-item mb-2">
                    <button class="news-header-btn d-flex justify-content-between align-items-center w-100 py-3 border-bottom collapsed" 
                            type="button" data-bs-toggle="collapse" data-bs-target="#news-collapse-{{ $item->id }}">
                        <span class="fw-bold text-uppercase">{{ $item->title }}</span>
                        <span class="news-icon">+</span>
                    </button>
                    
                    <div id="news-collapse-{{ $item->id }}" class="collapse" data-bs-parent="#newsAccordion">
                        <div class="news-body py-4 text-muted text-justify">
                            
                            {{-- Check if there is an image --}}
                            @if($item->image)
                                <div class="news-img-wrapper mb-3 text-center">
                                    <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid rounded shadow-sm news-img" alt="{{ $item->title }}">
                                </div>
                            @endif

                            <div class="news-content">
                                {!! nl2br(e($item->content)) !!}
                            </div>

                            <p class="mt-3 mb-0 small italic text-primary">
                                Posted: {{ $item->created_at->format('M d, Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <p class="text-muted">No news or announcements at the moment.</p>
                </div>
            @endforelse

        </div> 
    </section>
</div>