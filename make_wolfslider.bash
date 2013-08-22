rm mod_wolfslider.zip
mkdir mod_wolfslider
cp -r -p ./* mod_wolfslider/
rm -r ./mod_wolfslider/mod_wolfslider
zip -r mod_wolfslider.zip mod_wolfslider/* -x \*xcf \*bash
rm -r mod_wolfslider
