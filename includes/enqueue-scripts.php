<?php 

// Enqueue the Voiceflow script
function voiceflow_enqueue_script() {
    $project_id = get_option('voiceflow_project_id', '');
    if ($project_id) {
        $inline_script = "
            (function(d, t) {
                var v = d.createElement(t), s = d.getElementsByTagName(t)[0];
                v.onload = function() {
                    window.voiceflow.chat.load({
                        verify: { projectID: '{$project_id}' },
                        url: 'https://general-runtime.voiceflow.com',
                        versionID: 'production'
                    });
                }
                v.src = 'https://cdn.voiceflow.com/widget/bundle.mjs'; v.type = 'text/javascript'; s.parentNode.insertBefore(v, s);
            })(document, 'script');
        ";
        wp_register_script('voiceflow-placeholder-script', '', [], false, true);  // Register an empty script with in_footer set to true
        wp_enqueue_script('voiceflow-placeholder-script');  // Enqueue the empty script
        wp_add_inline_script('voiceflow-placeholder-script', $inline_script);  // Attach the inline script to the enqueued script
    }
}
add_action('wp_enqueue_scripts', 'voiceflow_enqueue_script');