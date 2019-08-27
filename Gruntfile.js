module.exports = function( grunt ) {
	require( 'load-grunt-tasks' )( grunt );

	// Project
	grunt.initConfig( {
		// Package
		pkg: grunt.file.readJSON( 'package.json' ),

		dirs: {
			ignore: [ 'build', 'node_modules', 'vendor' ].join( ',' ) 
		},

		// PHP Code Sniffer
		phpcs: {
			application: {
				src: [
					'**/*.php',
					'!node_modules/**',
					'!vendor/**',
					'!wordpress/**',
					'!wp-content/**'
				],
			},
			options: {
				bin: 'vendor/bin/phpcs',
				standard: 'phpcs.xml.dist',
				showSniffCodes: true
			}
		},

		// PHPLint
		phplint: {
			application: [
				'src/**/*.php',
				'test/**/*.php'
			],
		},

		// PHP Mess Detector
		phpmd: {
			application: {
				dir: 'src'
			},
			options: {
				exclude: '<%= dirs.ignore %>',
				reportFormat: 'text',
				rulesets: 'phpmd.ruleset.xml'
			}
		},

		// PHPUnit
		phpunit: {
			options: {
				bin: 'vendor/bin/phpunit'
			},
			classes: {
				
			}
		}
	} );

	// Default task(s).
	grunt.registerTask( 'default', [ 'phplint', 'phpmd', 'phpcs', 'phpunit' ] );
};
