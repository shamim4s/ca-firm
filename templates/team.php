<?php $pageTitle = 'Leadership Team'; ?>

<section class="bg-[#1c3f94] py-24 relative overflow-hidden">
    <div class="container mx-auto px-4 md:px-10 text-center relative z-10">
        <div class="inline-block px-4 py-1.5 bg-blue-800/50 rounded-full text-[10px] font-bold tracking-widest uppercase border border-blue-700/50 text-white mb-6">
            Our People
        </div>
        <h1 class="text-4xl md:text-[56px] font-bold text-white mb-6 tracking-tight leading-tight">Our Leadership</h1>
        <p class="text-blue-100 max-w-2xl mx-auto text-lg leading-relaxed font-light">Guiding our clients with decades of industry experience, deep technical expertise, and an uncompromising commitment to excellence.</p>
    </div>
</section>

<style>
/* Organizational Chart CSS */
.org-tree {
  display: flex;
  justify-content: center;
  overflow-x: auto;
  padding-bottom: 4rem;
  padding-top: 2rem;
}
.org-tree ul {
  padding-top: 36px; 
  position: relative;
  display: flex;
  justify-content: center;
  margin: 0;
  padding-left: 0;
}
.org-tree li {
  float: left; text-align: center;
  list-style-type: none;
  position: relative;
  padding: 36px 12px 0 12px;
}

/* Connectors */
.org-tree li::before, .org-tree li::after{
  content: '';
  position: absolute; top: 0; right: 50%;
  border-top: 1.5px solid #cbd5e1;
  width: 50%; height: 36px;
  z-index: 0;
}
.org-tree li::after{
  right: auto; left: 50%;
  border-left: 1.5px solid #cbd5e1;
}

/* Remove left-right borders from edge cases */
.org-tree li:only-child::after, .org-tree li:only-child::before {
  display: none;
}
.org-tree li:only-child { padding-top: 0;}

.org-tree li:first-child::before, .org-tree li:last-child::after{
  border: 0 none;
}
/* Re-add vertical lines to first/last nodes */
.org-tree li:first-child::after{
  border-radius: 12px 0 0 0;
}
.org-tree li:last-child::before{
  border-right: 1.5px solid #cbd5e1;
  border-radius: 0 12px 0 0;
}

/* Downward connectors from parents */
.org-tree ul::before{
  content: '';
  position: absolute; top: 0; left: 50%;
  border-left: 1.5px solid #cbd5e1;
  width: 0; height: 36px;
  margin-left: -0.75px; /* Align perfectly since border is 1.5px */
}

/* Remove top line from root */
.org-tree > ul { padding-top: 0; }
.org-tree > ul::before { display: none; }

/* Custom Scrollbar */
.org-tree::-webkit-scrollbar {
    height: 6px;
}
.org-tree::-webkit-scrollbar-track {
    background: transparent;
}
.org-tree::-webkit-scrollbar-thumb {
    background-color: #cbd5e1;
    border-radius: 20px;
}
</style>

<section class="py-24 bg-slate-50 overflow-hidden min-h-[600px]">
    <div class="container mx-auto px-4 max-w-[1200px]">
        <?php
        if (empty($org_data)) {
            echo '<div class="text-center py-12 text-slate-500">No leadership data available. Please add members from the Admin panel.</div>';
        } else {
            function renderOrgNode($node) {
                if (!$node) return '';
                $html = '<li>';
            $hasLink = !empty($node['linkedin_url']);
            
            $containerTag = $hasLink ? 'a' : 'div';
            $hrefAttr = $hasLink ? 'href="' . htmlspecialchars($node['linkedin_url']) . '" target="_blank" rel="noopener noreferrer"' : '';
            
            $html .= '<'. $containerTag . ' ' . $hrefAttr . ' class="flex flex-col items-center relative z-10 mx-2 md:mx-6 group cursor-' . ($hasLink ? 'pointer' : 'default') . '">';
            
            // Image Circle (Gradient Border)
            $html .= '<div class="relative w-[130px] h-[130px] md:w-[150px] md:h-[150px] rounded-full p-[3px] bg-gradient-to-r ' . $node['color'] . ' mb-5 group-hover:scale-105 transition-transform duration-300 shadow-xl">';
            // Inner white border padding
            $html .= '<div class="w-full h-full rounded-full overflow-hidden border-[4px] border-[#f4f6f8] bg-[#f4f6f8] shadow-inner relative">';
            $html .= '<img src="' . htmlspecialchars($node['img']) . '" referrerpolicy="no-referrer" alt="' . htmlspecialchars($node['name']) . '" class="w-full h-full object-cover">';
            $html .= '</div>';
            
            if ($hasLink) {
                // Add linkedin icon
                $html .= '<div class="absolute bottom-3 right-0 bg-white rounded-md p-1 shadow-md z-40 border border-slate-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#0A66C2]" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                            </svg>
                          </div>';
            }
            
            // Badge overlapped
            $html .= '<div class="absolute -bottom-5 left-1/2 -translate-x-1/2 w-max min-w-[150px] md:min-w-[170px] text-center z-20">';
            // Small UP triangle
            $html .= '<svg class="w-[18px] h-[10px] mx-auto absolute -top-[8px] left-1/2 -translate-x-1/2 z-10 ' . $node['svgColor'] . '" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 0L16 12H0L8 0Z" fill="currentColor"/></svg>';
            
            $html .= '<div class="bg-gradient-to-r ' . $node['color'] . ' text-white text-[11px] md:text-[13px] font-bold py-2 px-5 rounded-[12px] shadow-md uppercase tracking-wider relative z-20">';
            $html .= $node['name'];
            $html .= '</div>';
            $html .= '</div>'; // End Badge
            
            $html .= '</div>'; // End Image Circle
            
            // Info Box below
            $html .= '<div class="bg-white/80 backdrop-blur-md rounded-[8px] px-4 py-2 mt-1 text-center shadow-sm min-w-[130px] md:min-w-[150px] border border-white/50 relative z-10 group-hover:bg-white transition-colors duration-300">';
            $html .= '<div class="font-extrabold text-[#111827] text-[10px] md:text-[12px] uppercase tracking-widest leading-tight mb-1">' . $node['role'] . '</div>';
            
            if (!empty($node['years'])) {
                $html .= '<div class="' . $node['yearColor'] . ' text-[10px] md:text-[12px] font-bold tracking-wide">' . $node['years'] . '</div>';
            }
            
            $html .= '</div>';
            
            $html .= '</' . $containerTag . '>'; // End Link/Div
            
            // Children
            if (!empty($node['children'])) {
                $html .= '<ul>';
                foreach ($node['children'] as $child) {
                    $html .= renderOrgNode($child);
                }
                $html .= '</ul>';
            }
            
            $html .= '</li>';
            return $html;
        }
        } // close else block
        ?>

        <?php if (!empty($org_data)): ?>
        <div class="org-tree w-full">
            <ul>
                <?= renderOrgNode($org_data) ?>
            </ul>
        </div>
        <?php endif; ?>
        
    </div>
</section>
