/**
 * Twitch Player Initialization
 * 
 * This script initializes the Twitch player for the siglo21salto channel
 */

(function() {
    // Wait for DOM to be ready
    document.addEventListener('DOMContentLoaded', function() {
        // Check if the Twitch embed element exists
        var twitchEmbed = document.getElementById('twitch-embed');
        if (twitchEmbed) {
            // Get current hostname and protocol
            var currentHost = window.location.hostname;
            var currentProtocol = window.location.protocol; // http: or https:
            var parentDomains = ['siglo21.uy', 'www.siglo21.uy', 'localhost'];
            
            // For development environments (ddev, localhost, etc), add both http and https versions
            if (currentHost !== 'siglo21.uy' && currentHost !== 'www.siglo21.uy') {
                // Add current domain
                if (parentDomains.indexOf(currentHost) === -1) {
                    parentDomains.push(currentHost);
                }
            }
            
            var options = {
                width: '100%',
                height: '480',
                channel: 'siglo21salto',
                parent: parentDomains
            };
            
            try {
                // Initialize the Twitch player
                var player = new Twitch.Player("twitch-embed", options);
                
                // Set initial volume
                player.setVolume(0.5);
                
                // Optional: Add event listeners
                player.addEventListener(Twitch.Player.READY, function() {
                    console.log('Twitch player is ready');
                });
                
                player.addEventListener(Twitch.Player.PLAY, function() {
                    console.log('Twitch player started playing');
                });
            } catch (e) {
                console.error('Error initializing Twitch player:', e);
            }
        }
    });
})();
