# Advertising Entity: Release notes

8.x-1.0-beta11:
- New feature: Site wide context
- Refactored DFP Javascript implementation
NOTE: Contains API changes, which might affect your extensions or modifications.
Take care of it when updating your codebase. Export your configuration after
running database updates.

8.x-1.0-beta10:
- Fixed #2949411 by Cecilina: Js Missing Out of Page Ads define
- Fixed #2947876 - Processing of targeting currently requires
  at least one DOM query on each container element. This has been solved
  by moving targeting handling into the Advertising container.
- Optimization: Added in-memory caching of context plugins.
- Third party providers are now able to define context data.
NOTE: Contains API changes, which might affect your extensions or modifications.
Take care of it when updating your codebase. Export your configuration after
running database updates.

8.x-1.0-beta9:
- Ensure proper access to context data.
NOTE: This is a security release. All sites are advised to update.

8.x-1.0-beta8:
- Bugfix: "context_object.remove is not a function"
- Changed JSON formatted output to unescaped unicode and slashes.

8.x-1.0-beta7:
- Minor bugfix: Check on exisiting id of Ad container with typeof instructor.

8.x-1.0-beta6:
- Bugfix: Make sure containers are being collected only once.
  This bug caused multiple loading of ad slots in case the provider
  doesn't sufficiently care whether the slots already have been loaded before.
- Removed Javascript behavior which created a new id for duplicate containers.
  This behavior is obsolete and should be avoided since Advertising containers
  must have a unique id provided by the backend system.

8.x-1.0-beta5:
- Javascript implementations have been refactored to improve load performance
  and to be more accessible for extending or manipulating behaviors.
- Added a sub-module which provides the ability to load fallback Advertisement.
NOTE: Code changes might affect your extensions or modifications.
Take care of it when updating your codebase.

8.x-1.0-beta4:
- Omit cache records for Advertising entities, see
  https://github.com/BurdaMagazinOrg/module-ad_entity/issues/7
  https://www.drupal.org/project/ad_entity/issues/2937615

8.x-1.0-beta3:
- Bugfix: Context fields are not included on server-side collections
  when their item list is empty.

8.x-1.0-beta2:
- Bugfix: Block caching might break when ads have been turned off before.

8.x-1.0-beta1:
- First beta release (same as 1.0-alpha29)

8.x-1.0-alpha29:
- Added in-memory caching for context data reset.

This release is a candidate for the first beta release.

8.x-1.0-alpha28:
- Added fallback for resetting context of multiple entities.
  Resetting context data is still a problem in this version, see
  https://github.com/BurdaMagazinOrg/module-ad_entity/issues/12.

This release is a candidate for the first beta release.

8.x-1.0-alpha27:
- Prevent double-caching when a block already holds the display config.

This release is a candidate for the first beta release.

8.x-1.0-alpha26:
- AdBlocks have been refactored to AdDisplay configuration entities.
  This change includes a new configuration schema and permissions.
  You'll need to export your config after running the updates.
- Added theme hook suggestions for Advertising entities and Display configs.
- Prevent a double-reset when viewing entities via their main routes.
- Created the service collection class AdEntityServices which offers
  any single service provided by the ad_entity module.
This release is a candidate for the first beta release.

8.x-1.0-alpha25:
- Replaced Xss::filter with Html::escape to avoid a possibly broken
  HTML structure by given user input.
- Added GPLv2 license.

8.x-1.0-alpha24:
- ad_entity_adtech: Switched to asynchronous loading of Advertisement.
- Added defensive checks for existing field items.
  Issue: https://github.com/BurdaMagazinOrg/module-ad_entity/issues/8
