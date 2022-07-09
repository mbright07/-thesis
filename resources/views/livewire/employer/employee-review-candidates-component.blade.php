<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div id="review_form_wrapper">
                    <div id="comments">
                        <h2 class="woocommerce-Reviews-title">{{ __('user/user-experience.add_review') }}</h2>
                        <ol class="commentlist">
                            <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1"
                                id="li-comment-20">
                                <div id="comment-20" class="comment_container">
                                    @if($recruitmentJob->recruitment->user->profile && $recruitmentJob->recruitment->user->profile->image)
                                        <img alt=""
                                             src="{{ asset('assets/images/profile') }}/{{ $recruitmentJob->recruitment->user->profile->image }}"
                                             height="80" width="80">
                                    @else
                                        <img alt=""
                                             src="{{ asset('assets/images/profile/default-avatar-profile-image.jpg') }}"
                                             height="80" width="80">
                                    @endif
                                    <div class="comment-text">
                                        <p class="meta">
                                            <a class="link-to-product"
                                               href="{{ route('employer.candidate.details', ['user_id' => $recruitmentJob->recruitment->user->id]) }}"><strong
                                                    class="woocommerce-review__author">{{ $recruitmentJob->recruitment->user->name }}</strong></a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </div>
                    <div id="review_form">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <div id="respond" class="comment-respond">
                            <form wire:submit.prevent="addReview" action="#" method="post" id="commentform"
                                  class="comment-form" novalidate="">
                                <div class="comment-form-rating">
                                    <span>{{ __('user/user-experience.your_rating') }}</span>
                                    <p class="stars">
                                        <label for="rated-1"></label>
                                        <input type="radio" id="rated-1" name="rating" value="1"
                                               wire:model="rating">
                                        <label for="rated-2"></label>
                                        <input type="radio" id="rated-2" name="rating" value="2"
                                               wire:model="rating">
                                        <label for="rated-3"></label>
                                        <input type="radio" id="rated-3" name="rating" value="3"
                                               wire:model="rating">
                                        <label for="rated-4"></label>
                                        <input type="radio" id="rated-4" name="rating" value="4"
                                               wire:model="rating">
                                        <label for="rated-5"></label>
                                        <input type="radio" id="rated-5" name="rating" value="5"
                                               checked="checked" wire:model="rating">
                                    @error('rating')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    </p>
                                </div>
                                <p class="comment-form-comment">
                                    <label for="comment">{{ __('user/user-experience.your_review') }} <span
                                            class="required">*</span>
                                    </label>
                                    <textarea id="comment" name="comment" cols="45" rows="8" wire:model="comment"></textarea>
                                @error('comment')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </p>
                                <p class="form-submit">
                                    <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                                </p>
                            </form>

                        </div><!-- .comment-respond-->
                    </div><!-- #review_form -->
                </div><!-- #review_form_wrapper -->
            </div>
        </div>
    </div>
</div>
