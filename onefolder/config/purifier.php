<?php
/**
 * Ok, glad you are here
 * first we get a config instance, and set the settings
 * $config = HTMLPurifier_Config::createDefault();
 * $config->set('Core.Encoding', $this->config->get('purifier.encoding'));
 * $config->set('Cache.SerializerPath', $this->config->get('purifier.cachePath'));
 * if ( ! $this->config->get('purifier.finalize')) {
 *     $config->autoFinalize = false;
 * }
 * $config->loadArray($this->getConfig());
 *
 * You must NOT delete the default settings
 * anything in settings should be compacted with params that needed to instance HTMLPurifier_Config.
 *
 * @link http://htmlpurifier.org/live/configdoc/plain.html
 */

return [
    'encoding'  => 'UTF-8',
    'finalize'  => true,
    'cachePath' => storage_path('app/purifier'),
    'cacheFileMode' => 0755,
    'settings'  => [
        'default' => [
            'HTML.Doctype'             => 'HTML 4.01 Transitional',
            "HTML.SafeIframe"      => 'true',

            "URI.SafeIframeRegexp" => "%^(http://|https://|//)(www.youtube.com/embed/|player.vimeo.com/video/)%",

            'HTML.Allowed'             => 'div,b,strong,i,em,a[href|title|class|style|target],ul,ol,li,p,br,span,img[width|height|alt|src|class|style],h1,h2,h3,h4,h5,h6,blockquote,pre,code,table[cellspacing|cellpadding|border],tbody,td[class|style|colspan|rowspan],tfoot,th[class|style|colspan|rowspan],thead,tr,iframe[width|height|src|frameborder],sup,sub,*[style|class|id]',
            'CSS.AllowedProperties'    => 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align,margin,margin-top,margin-left,margin-right,margin-bottom,padding,padding-left,padding-right,padding-bottom,padding-top,list-style-type',
            'AutoFormat.AutoParagraph' => true,
            'AutoFormat.RemoveEmpty'   => true,
        ],
    ],

];