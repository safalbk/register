package net.learn2develop.WebView;

import android.app.Activity;
import android.os.Bundle;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public class WebViewActivity extends Activity {
    /** Called when the activity is first created. */
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.main);
        
        WebView wv = (WebView) findViewById(R.id.webview1);
                
        WebSettings webSettings = wv.getSettings();
        webSettings.setBuiltInZoomControls(true);
        /*
        wv.loadUrl(
            "http://chart.apis.google.com/chart" +
            "?chs=300x225" +
            "&cht=v" +
            "&chco=FF6342,ADDE63,63C6DE" +
            "&chd=t:100,80,60,30,30,30,10" +
            "&chdl=A|B|C");
            */
        
        /*
        wv.setWebViewClient(new Callback());
        wv.loadUrl("http://www.wrox.com");
        */

        /*
        final String mimeType = "text/html";
        final String encoding = "UTF-8";
        String html = "<H1>A simple HTML page</H1><body>" +
            "<p>The quick brown fox jumps over the lazy dog</p></body>";
        wv.loadDataWithBaseURL("", html, mimeType, encoding, "");
        */
       // wv.loadUrl("file:///android_asset/Index.html");

        wv.loadUrl("http://127.0.0.1:8080/register/firstpage.html");
    }   
    private class Callback extends WebViewClient {
        @Override
        public boolean shouldOverrideUrlLoading(WebView view, String url) {
            return(false);
        }
    }

}