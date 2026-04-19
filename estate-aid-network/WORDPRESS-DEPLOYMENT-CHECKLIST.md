# WordPress Deployment Checklist

This is the plain-English setup guide for installing and launching the `Estate Aid Network` theme in WordPress.

## Before You Start

Make sure you have:

- access to your WordPress admin
- the `estate-aid-network` theme folder from this project
- your logo if you have one
- any first-round provider information you want to enter

## Part 1: Put the Theme Into WordPress

### Option A: Upload as a ZIP

1. On your computer, compress the `estate-aid-network` folder into a zip file.
2. In WordPress, go to `Appearance > Themes`.
3. Click `Add New Theme`.
4. Click `Upload Theme`.
5. Upload the zip file.
6. Click `Install Now`.
7. Click `Activate`.

### Option B: Copy Into Hosting File Manager

If your host gives you file access:

1. Open your WordPress files.
2. Go to `wp-content/themes/`.
3. Copy the `estate-aid-network` folder into that directory.
4. In WordPress, go to `Appearance > Themes`.
5. Activate `Estate Aid Network`.

## Part 2: Set Basic WordPress Settings

In WordPress admin:

1. Go to `Settings > General`.
2. Set the site title to `The Estate Aid Network`.
3. Set the tagline if you want one.
4. Save changes.

Then:

1. Go to `Settings > Reading`.
2. Choose `A static page`.
3. Set your homepage once the home page has been created.
4. Save changes.

## Part 3: Create Core Pages

Create these pages first:

- Home
- Vetted Professionals
- About
- Resources
- Contact
- Free Resources Package

You can create more later, but these are enough to avoid obvious dead ends.

## Part 4: Assign Page Templates

### Home Page

1. Edit the `Home` page.
2. In the page template area, choose `Home Page`.
3. Publish or update the page.

### Vetted Professionals Page

1. Edit the `Vetted Professionals` page.
2. In the page template area, choose `Provider Directory`.
3. Publish or update the page.

Suggested intro copy for `Vetted Professionals`:

`Browse our network of vetted professionals by service and location. Start with the type of help you need, then narrow by state and county or city.`

## Part 5: Set the Home Page

Once the `Home` page exists:

1. Go to `Settings > Reading`.
2. Choose `A static page`.
3. Set `Homepage` to `Home`.
4. Save changes.

## Part 6: Set Up Menus

Go to `Appearance > Menus` or `Appearance > Editor/Navigation`, depending on your WordPress setup.

Create and assign:

- Primary Menu
- Footer Services Menu
- Footer Resources Menu
- Footer Legal Menu

### Recommended Primary Menu

- Vetted Professionals
- Probate Attorneys
- Real Estate Services
- Property Security & Preservation
- Estate Sales & Personal Property
- Resources
- About

If some pages do not exist yet, either:

- create simple placeholder pages, or
- leave them out of the menu until ready

## Part 7: Update Theme Customizer Content

Go to `Appearance > Customize`.

Update these sections:

### Estate Aid Network Contact

- phone display
- phone link digits
- contact email
- footer about title
- footer tagline
- footer description
- newsletter privacy note

### Estate Aid Network Social Links

- YouTube URL
- LinkedIn URL
- Facebook URL

### Homepage Content

- hero eyebrow
- hero heading
- hero description
- YouTube embed URL
- YouTube channel URL
- video button text
- video supporting text
- testimonial quote
- testimonial attribution
- sticky CTA text and links

### Homepage Cards and Stats

- what we do section text
- feature card copy and links
- stats
- service card copy and links

## Part 8: Create Directory Terms

Go to the `Service Providers` area in WordPress and create these taxonomies.

### Service Types

- Probate Attorneys
- Real Estate Services
- Property Security & Preservation
- Estate Sales & Personal Property
- Financial & Tax Services
- Appraisals & Valuations
- Contractors, Cleanout & Repairs
- General Vetted Professionals

### States

- North Carolina
- Virginia
- Maryland
- Florida
- California
- New Jersey
- New York
- Massachusetts
- Illinois
- Washington
- Oregon
- Minnesota
- District of Columbia

### Counties and Cities

North Carolina
- Wake County
- Johnston County
- Cumberland County
- New Hanover County
- Granville County
- Brunswick County
- Pender County
- Onslow County
- Wayne County
- Franklin County
- Durham County

Virginia
- Roanoke
- Richmond
- Fairfax County
- Loudoun County

Maryland
- Howard County
- Montgomery County
- Anne Arundel County

Florida
- Palm Beach County
- Lee County
- Duval County
- Leon County
- Wakulla County

California
- Los Angeles County
- Orange County

New Jersey
- Bergen County

New York
- Queens

Massachusetts
- Essex County

Illinois
- Cook County

Washington
- Thurston County
- Spokane

Oregon
- Clackamas County

Minnesota
- Anoka County
- Hennepin County

District of Columbia
- Washington

## Part 9: Add Your First Providers

Start small. Add 3 to 5 first.

For each `Service Provider` entry:

1. Add the title.
2. Add the main description in the content area.
3. Add the short summary in the excerpt area.
4. Choose the right service type.
5. Choose the right state.
6. Choose the right county or city.
7. Fill in the provider details box:
   - Company Name
   - Primary Contact
   - Phone
   - Email
   - Website
   - Street Address
   - Service Area Notes
   - Profile CTA Label
   - Profile CTA URL
8. Publish.

## Part 10: Test the Main User Paths

After setup, test these paths:

### Home Page

- homepage loads correctly
- header and footer appear
- homepage copy looks right
- video link works
- sticky CTA buttons work

### Vetted Professionals

- page loads
- filters appear
- service filter works
- state filter works
- county or city filter works
- results page updates
- provider profile opens

### Provider Profile

- provider details display correctly
- phone and email links work
- website link works
- CTA button works

### Menu

- each visible menu item goes somewhere real
- no broken or empty links

## Part 11: Expected Dead Ends Right After Deployment

These may still be incomplete until we build more pages:

- Probate Attorneys page if separate from directory
- Real Estate Services page if separate from directory
- Property Security & Preservation page
- Estate Sales & Personal Property page
- Resources subpages
- Blog styling and blog archive

That is normal. You can launch the framework first and keep building.

## Part 12: Best Post-Deployment Next Steps

Recommended order:

1. get the home page working visually
2. get `Vetted Professionals` working
3. add real providers
4. point the menu only to real pages
5. build About
6. build Resources
7. build Contact

## GitHub Reminder

Before deploying, make sure your latest work is:

1. committed in GitHub Desktop
2. pushed to GitHub

That way GitHub stays your backup and source of truth.
