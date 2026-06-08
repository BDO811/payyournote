<?php
function eid() { return substr(md5(uniqid('',true)),0,7); }

// ── HELPERS ──
function col($width, $widgets, $bg='', $pad=[]) {
    $s = ['_column_size'=>$width];
    if ($bg) { $s['background_background']='classic'; $s['background_color']=$bg; }
    if ($pad) { $s['padding']=$pad; }
    return ['id'=>eid(),'elType'=>'column','settings'=>$s,'elements'=>$widgets,'isLocked'=>false];
}

function heading($text, $tag='h2', $color='#0B1F3A', $size=36, $weight='800', $align='left') {
    return ['id'=>eid(),'elType'=>'widget','widgetType'=>'heading','settings'=>[
        'title'=>$text,'header_size'=>$tag,'title_color'=>$color,'align'=>$align,
        'typography_typography'=>'custom','typography_font_family'=>'Poppins',
        'typography_font_size'=>['size'=>$size,'unit'=>'px'],
        'typography_font_weight'=>$weight,
        'typography_line_height'=>['size'=>1.1,'unit'=>'em'],
        'typography_letter_spacing'=>['size'=>-1,'unit'=>'px'],
    ]];
}

function text_w($html, $color='#6B7280', $size=16) {
    return ['id'=>eid(),'elType'=>'widget','widgetType'=>'text-editor','settings'=>[
        'editor'=>$html,'text_color'=>$color,
        'typography_typography'=>'custom','typography_font_family'=>'Poppins',
        'typography_font_size'=>['size'=>$size,'unit'=>'px'],
        'typography_line_height'=>['size'=>1.7,'unit'=>'em'],
    ]];
}

function html_w($html) {
    return ['id'=>eid(),'elType'=>'widget','widgetType'=>'html','settings'=>['html'=>$html]];
}

function spacer($h=40) {
    return ['id'=>eid(),'elType'=>'widget','widgetType'=>'spacer','settings'=>['space'=>['size'=>$h,'unit'=>'px']]];
}

function tag_badge($label) {
    return html_w('<div style="display:inline-block;background:rgba(255,107,53,0.1);color:#FF6B35;font-weight:700;font-size:12px;letter-spacing:0.08em;text-transform:uppercase;padding:6px 16px;border-radius:50px;font-family:Poppins,sans-serif;margin-bottom:8px;">'.$label.'</div>');
}

function section_num($n) {
    return html_w('<div style="font-family:Poppins,sans-serif;font-size:11px;font-weight:800;letter-spacing:0.14em;color:#FF6B35;text-transform:uppercase;margin-bottom:8px;">'.$n.'</div>');
}

function mk_section($bg, $pad_top, $pad_bot, $cols) {
    return [
        'id'=>eid(),'elType'=>'section','isInner'=>false,
        'settings'=>[
            'background_background'=>'classic','background_color'=>$bg,
            'padding'=>['top'=>(string)$pad_top,'right'=>'0','bottom'=>(string)$pad_bot,'left'=>'0','unit'=>'px','isLinked'=>false],
            'layout'=>'full_width',
        ],
        'elements'=>$cols,
    ];
}

// ── HERO ──
$hero_left = [
    html_w('<div style="display:inline-flex;align-items:center;gap:8px;font-family:Poppins,sans-serif;font-weight:600;font-size:13px;color:#6B7280;letter-spacing:0.04em;margin-bottom:4px;"><span style="width:8px;height:8px;background:#22C55E;border-radius:50%;display:inline-block;"></span> Note Servicing Agent</div>'),
    heading('Simple.<br>Efficient.<br><span style="color:#FF6B35;">Reliable.</span>', 'h1', '#0B1F3A', 56, '900'),
    spacer(8),
    text_w('PayYourNote.com processes payments in a timely, efficient and economical way. We help buyers, sellers, and brokers service any type of note payment.', '#6B7280', 16),
    spacer(16),
    html_w('<div style="display:flex;gap:14px;flex-wrap:wrap;"><a href="#" style="display:inline-flex;align-items:center;gap:6px;background:#FF6B35;color:#fff;font-weight:700;font-size:15px;padding:14px 28px;border-radius:50px;text-decoration:none;font-family:Poppins,sans-serif;">Pay Online (ACH) &rarr;</a><a href="#" style="display:inline-flex;align-items:center;background:transparent;color:#0B1F3A;font-weight:600;font-size:15px;padding:14px 28px;border-radius:50px;border:2px solid #E5E1D8;text-decoration:none;font-family:Poppins,sans-serif;">Pay By Mail</a></div>'),
    spacer(24),
    html_w('<div style="display:flex;align-items:center;gap:14px;flex-wrap:wrap;font-family:Poppins,sans-serif;font-size:12px;font-weight:600;color:#0B1F3A;"><span>&#10003; Trusted Note Servicing</span><span style="color:#E5E1D8;">|</span><span>&#10003; Buyers, Sellers &amp; Brokers</span><span style="color:#E5E1D8;">|</span><span>&#10003; M&ndash;F 9am&ndash;4pm &nbsp;210-610-6250</span></div>'),
];

$hero_right = [
    html_w('<div style="background:#0B1F3A;border-radius:24px;padding:36px;color:#fff;box-shadow:0 12px 48px rgba(11,31,58,0.18);position:relative;overflow:hidden;"><div style="position:absolute;top:-60px;right:-60px;width:200px;height:200px;background:radial-gradient(circle,rgba(255,107,53,0.15) 0%,transparent 70%);border-radius:50%;"></div><div style="font-size:11px;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;color:rgba(255,255,255,0.45);margin-bottom:20px;font-family:Poppins,sans-serif;">Payment Options</div><div style="display:flex;flex-direction:column;gap:12px;margin-bottom:24px;"><a href="#" style="display:flex;align-items:center;gap:16px;background:rgba(255,255,255,0.06);border-radius:14px;padding:16px 18px;text-decoration:none;"><div style="width:48px;height:48px;background:rgba(255,107,53,0.15);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><rect x="2" y="5" width="20" height="14" rx="2" stroke="#FF6B35" stroke-width="1.8"/><path d="M2 10h20" stroke="#FF6B35" stroke-width="1.8"/></svg></div><div style="flex:1;"><div style="font-weight:700;font-size:15px;color:#fff;font-family:Poppins,sans-serif;">Pay Online</div><div style="font-size:12px;color:rgba(255,255,255,0.45);font-family:Poppins,sans-serif;">ACH &mdash; fast &amp; secure</div></div><div style="color:#FF6B35;font-weight:700;">&rarr;</div></a><a href="#" style="display:flex;align-items:center;gap:16px;background:rgba(255,255,255,0.06);border-radius:14px;padding:16px 18px;text-decoration:none;"><div style="width:48px;height:48px;background:rgba(255,107,53,0.15);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke="#FF6B35" stroke-width="1.8" stroke-linecap="round"/></svg></div><div style="flex:1;"><div style="font-weight:700;font-size:15px;color:#fff;font-family:Poppins,sans-serif;">Pay By Mail</div><div style="font-size:12px;color:rgba(255,255,255,0.45);font-family:Poppins,sans-serif;">Send check or money order</div></div><div style="color:#FF6B35;font-weight:700;">&rarr;</div></a></div><div style="height:1px;background:rgba(255,255,255,0.07);margin-bottom:24px;"></div><div style="font-size:11px;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;color:rgba(255,255,255,0.35);margin-bottom:12px;font-family:Poppins,sans-serif;">Account Access</div><div style="display:flex;gap:12px;"><a href="#" style="flex:1;text-align:center;padding:12px;border-radius:10px;background:#FF6B35;color:#fff;font-weight:700;font-size:14px;text-decoration:none;font-family:Poppins,sans-serif;">Buyer Login</a><a href="#" style="flex:1;text-align:center;padding:12px;border-radius:10px;background:rgba(255,255,255,0.08);color:#fff;font-weight:700;font-size:14px;text-decoration:none;border:1px solid rgba(255,255,255,0.1);font-family:Poppins,sans-serif;">Seller Login</a></div></div>'),
    spacer(14),
    html_w('<div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;"><div style="background:#fff;border-radius:16px;padding:18px 20px;display:flex;align-items:center;gap:14px;box-shadow:0 4px 24px rgba(11,31,58,0.09);"><div style="width:36px;height:36px;background:rgba(34,197,94,0.1);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:16px;color:#22C55E;font-weight:800;">&#10003;</div><div><div style="font-weight:700;font-size:13px;color:#0B1F3A;font-family:Poppins,sans-serif;">Escrow Services</div><div style="font-size:12px;color:#6B7280;font-family:Poppins,sans-serif;">Taxes &amp; Insurance</div></div></div><div style="background:#fff;border-radius:16px;padding:18px 20px;display:flex;align-items:center;gap:14px;box-shadow:0 4px 24px rgba(11,31,58,0.09);"><div style="width:36px;height:36px;background:rgba(255,107,53,0.1);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:16px;color:#FF6B35;font-weight:800;">&#9656;</div><div><div style="font-weight:700;font-size:13px;color:#0B1F3A;font-family:Poppins,sans-serif;">Tax Reporting</div><div style="font-size:12px;color:#6B7280;font-family:Poppins,sans-serif;">Seller Financed Notes</div></div></div></div>'),
];

$s1_hero = mk_section('#F8F7F4', 140, 80, [
    col(50, $hero_left, '', ['top'=>'0','right'=>'20','bottom'=>'0','left'=>'20','unit'=>'px','isLinked'=>false]),
    col(50, $hero_right, '', ['top'=>'0','right'=>'20','bottom'=>'0','left'=>'20','unit'=>'px','isLinked'=>false]),
]);

// ── ABOUT ──
$s2_about = mk_section('#0B1F3A', 80, 80, [
    col(100, [
        section_num('01'),
        tag_badge('About Us'),
        heading('Advanced technology.<br>Personal service.', 'h2', '#ffffff', 40, '800'),
        spacer(16),
        text_w('<p>PayYourNote.com is a note servicing agent. With the utilization of advanced communication technology, PayYourNote.com is able to process payments in a timely, efficient and economical way.</p>', 'rgba(255,255,255,0.6)', 16),
        spacer(8),
        text_w('<p>We are able to help buyers, sellers, brokers and can service any type of note payment.</p>', 'rgba(255,255,255,0.6)', 16),
    ], '', ['top'=>'0','right'=>'60','bottom'=>'0','left'=>'60','unit'=>'px','isLinked'=>false]),
]);

// ── SERVICES ──
function svc_card($icon, $title, $desc) {
    return html_w('<div style="background:#fff;border-radius:20px;padding:36px 28px;box-shadow:0 4px 24px rgba(11,31,58,0.09);border:1px solid #E5E1D8;height:100%;"><div style="font-size:32px;margin-bottom:16px;">'.$icon.'</div><h3 style="font-family:Poppins,sans-serif;font-size:18px;font-weight:700;color:#0B1F3A;margin-bottom:10px;">'.$title.'</h3><p style="font-family:Poppins,sans-serif;font-size:14px;color:#6B7280;line-height:1.65;margin:0;">'.$desc.'</p></div>');
}

$s3_services = mk_section('#ffffff', 100, 100, [
    col(100, [
        section_num('02'),
        tag_badge('Our Focus'),
        heading('What we do for you', 'h2', '#0B1F3A', 36, '800', 'center'),
        text_w('<p style="text-align:center;">We understand your requirement and provide quality works.</p>', '#6B7280', 16),
        spacer(40),
    ], '', ['top'=>'0','right'=>'60','bottom'=>'0','left'=>'60','unit'=>'px','isLinked'=>false]),
    col(25, [svc_card('💰', 'Note Collection', 'We calculate and collect on a monthly, quarterly or annual basis payments due on your seller financed note.')]),
    col(25, [svc_card('🏠', 'Escrow Collection', 'We assist with Escrow Services for Property Taxes, Insurance and other Dues so nothing slips through the cracks.')]),
    col(25, [svc_card('📋', 'Taxation', 'We monitor and provide Tax documentation for Seller Financed Notes, keeping you compliant come tax time.')]),
    col(25, [svc_card('💻', 'Online Portal', 'We provide an online portal for both buyers and sellers to view statements, payment history, and account details anytime.')]),
]);

// ── TESTIMONIALS ──
$s4_testimonials = mk_section('#EEEAE3', 100, 100, [
    col(100, [
        section_num('03'),
        tag_badge('Testimonials'),
        heading('What our clients say', 'h2', '#0B1F3A', 36, '800', 'center'),
        spacer(40),
        html_w('<div style="max-width:720px;margin:0 auto;background:#fff;border-radius:24px;padding:48px;box-shadow:0 12px 48px rgba(11,31,58,0.12);"><p style="font-family:Poppins,sans-serif;font-size:17px;color:#0B1F3A;line-height:1.75;font-style:italic;margin-bottom:32px;">&ldquo;PayYourNote provided exclusive services for collection on my seller financed note with comprehensive servicing for both the buyer and myself as a seller. I did not have to worry about the escrow services nor the tax reporting.&rdquo;</p><div style="display:flex;align-items:center;gap:16px;"><div style="width:44px;height:44px;background:#0B1F3A;color:#fff;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:18px;font-family:Poppins,sans-serif;">S</div><div><div style="font-weight:700;font-size:14px;color:#0B1F3A;font-family:Poppins,sans-serif;">Satisfied Seller</div><div style="font-size:12px;color:#6B7280;font-family:Poppins,sans-serif;">Seller Financed Note Client</div></div></div></div>'),
    ], '', ['top'=>'0','right'=>'60','bottom'=>'0','left'=>'60','unit'=>'px','isLinked'=>false]),
]);

// ── CONTACT ──
$s5_contact = mk_section('#0B1F3A', 100, 100, [
    col(45, [
        section_num('04'),
        tag_badge('Get In Touch'),
        heading('We&rsquo;re here for you', 'h2', '#ffffff', 36, '800'),
        spacer(8),
        text_w('<p>Reach out and our team will respond promptly.</p>', 'rgba(255,255,255,0.55)', 15),
        spacer(32),
        html_w('<div style="display:flex;flex-direction:column;gap:24px;font-family:Poppins,sans-serif;"><div><div style="font-size:11px;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;color:rgba(255,255,255,0.35);margin-bottom:6px;">Phone</div><a href="tel:2106106250" style="font-size:16px;font-weight:600;color:#fff;text-decoration:none;">210-610-6250</a><div style="font-size:12px;color:rgba(255,255,255,0.35);">M&ndash;F 9am&ndash;4pm</div></div><div><div style="font-size:11px;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;color:rgba(255,255,255,0.35);margin-bottom:6px;">Email</div><a href="mailto:staff@payyournote.com" style="display:block;font-size:15px;font-weight:600;color:#fff;text-decoration:none;">staff@payyournote.com</a><a href="mailto:admin@payyournote.com" style="display:block;font-size:15px;font-weight:600;color:#fff;text-decoration:none;">admin@payyournote.com</a></div><div><div style="font-size:11px;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;color:rgba(255,255,255,0.35);margin-bottom:6px;">Office</div><div style="font-size:15px;font-weight:600;color:#fff;">8626 Tesoro Dr., Suite 701</div><div style="font-size:15px;font-weight:600;color:#fff;">San Antonio, Texas 78217</div></div></div>'),
    ], '', ['top'=>'0','right'=>'20','bottom'=>'0','left'=>'40','unit'=>'px','isLinked'=>false]),
    col(55, [
        html_w('<div style="background:#fff;border-radius:24px;padding:40px;box-shadow:0 12px 48px rgba(11,31,58,0.18);"><h3 style="font-family:Poppins,sans-serif;font-size:22px;font-weight:800;color:#0B1F3A;margin-bottom:28px;">Send a Message</h3><form style="display:flex;flex-direction:column;gap:16px;"><div style="display:flex;flex-direction:column;gap:6px;"><label style="font-family:Poppins,sans-serif;font-size:12px;font-weight:600;color:#0B1F3A;">Your Name</label><input type="text" placeholder="Jane Smith" style="padding:12px 16px;border:1.5px solid #E5E1D8;border-radius:10px;font-size:14px;font-family:Poppins,sans-serif;background:#F8F7F4;"></div><div style="display:flex;flex-direction:column;gap:6px;"><label style="font-family:Poppins,sans-serif;font-size:12px;font-weight:600;color:#0B1F3A;">Email Address</label><input type="email" placeholder="jane@example.com" style="padding:12px 16px;border:1.5px solid #E5E1D8;border-radius:10px;font-size:14px;font-family:Poppins,sans-serif;background:#F8F7F4;"></div><div style="display:flex;flex-direction:column;gap:6px;"><label style="font-family:Poppins,sans-serif;font-size:12px;font-weight:600;color:#0B1F3A;">I am a&hellip;</label><select style="padding:12px 16px;border:1.5px solid #E5E1D8;border-radius:10px;font-size:14px;font-family:Poppins,sans-serif;background:#F8F7F4;"><option>Buyer</option><option>Seller</option><option>Broker</option><option>Other</option></select></div><div style="display:flex;flex-direction:column;gap:6px;"><label style="font-family:Poppins,sans-serif;font-size:12px;font-weight:600;color:#0B1F3A;">Message</label><textarea rows="4" placeholder="How can we help you?" style="padding:12px 16px;border:1.5px solid #E5E1D8;border-radius:10px;font-size:14px;font-family:Poppins,sans-serif;background:#F8F7F4;resize:vertical;"></textarea></div><button type="submit" style="background:#FF6B35;color:#fff;font-family:Poppins,sans-serif;font-weight:700;font-size:16px;padding:16px;border:none;border-radius:50px;cursor:pointer;">Send Message &rarr;</button></form></div>'),
    ], '', ['top'=>'0','right'=>'40','bottom'=>'0','left'=>'20','unit'=>'px','isLinked'=>false]),
]);

// ── SAVE ──
$page_data = [$s1_hero, $s2_about, $s3_services, $s4_testimonials, $s5_contact];
$json = json_encode($page_data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

wp_update_post(['ID'=>7,'post_title'=>'Home','post_status'=>'publish','post_name'=>'home']);
update_post_meta(7, '_elementor_data', wp_slash($json));
update_post_meta(7, '_elementor_edit_mode', 'builder');
update_post_meta(7, '_elementor_template_type', 'wp-page');
update_post_meta(7, '_elementor_version', '4.1.1');
update_option('show_on_front', 'page');
update_option('page_on_front', 7);

if (class_exists('\Elementor\Plugin')) {
    \Elementor\Plugin::$instance->files_manager->clear_cache();
}

echo 'Done: ' . count($page_data) . ' sections saved to page 7. Front page set.';
