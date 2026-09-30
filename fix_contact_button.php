<?php
$c = file_get_contents('resources/views/frontend/contact.blade.php');

$oldButton = <<<EOD
    <div class="fda-admission-button-wrap-v2">
        <div class="fda-button-wrapper">
            <button type="submit" data-wait="Please wait..." class="fda-submit w-button" style="width: auto; padding: 12px 30px; font-size: 16px; border-radius: 30px; background-color: var(--accent--accent-900, #332920); color: white; cursor: pointer; border: none; font-weight: 500;">Submit</button>
        </div>
    </div>
EOD;

$newButton = <<<EOD
    <div class="fda-admission-button-wrap-v2">
        <div submit-button="v1" class="fda-button-wrapper">
            <a data-wf--fda-button-v1--variant="rose-background" href="#" class="fda-button-v1 w-variant-15a48d83-c7c5-7d54-88b9-d154266f84bb w-inline-block">
                <div class="fda-button-overlay"></div>
                <div class="w-layout-hflex fda-button-text-wrapper-v1 fda-overflow-hidden">
                    <div class="fda-button-text fda-1 w-variant-15a48d83-c7c5-7d54-88b9-d154266f84bb">Submit</div>
                    <div class="fda-button-text fda-2">Submit</div>
                </div>
            </a>
            <input type="submit" data-wait="Please wait..." class="fda-submit w-button" value="Submit"/>
        </div>
    </div>
EOD;

if (strpos($c, $oldButton) !== false) {
    $c = str_replace($oldButton, $newButton, $c);
    file_put_contents('resources/views/frontend/contact.blade.php', $c);
    echo "Button fixed.\n";
} else {
    // Let's use regex in case of spacing issues
    $pattern = '/<div class="fda-admission-button-wrap-v2">.*?<\/div>\s*<\/div>/s';
    $c = preg_replace($pattern, $newButton, $c, 1);
    file_put_contents('resources/views/frontend/contact.blade.php', $c);
    echo "Button fixed via regex.\n";
}
