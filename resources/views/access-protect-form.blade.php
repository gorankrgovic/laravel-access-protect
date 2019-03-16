<div class="uk-section uk-section-large uk-section-secondary uk-height-viewport">
    <div class="uk-container">
        <div class="uk-flex uk-flex-center">
            <div class="uk-width-1-3@m uk-text-center">
                <div class="uk-card uk-card-body">
                    <form method="GET">
                        @csrf
                        <input type="password" name="access-protected" placeholder="Please enter password" class="uk-input uk-form-large">
                        @if (Request::get('access-protected'))
                            <div class="uk-text-danger">Password is wrong</div>
                        @endif

                        <button type="submit" class="uk-margin-top uk-button uk-button-primary uk-button-large uk-width-1-1">Enter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>