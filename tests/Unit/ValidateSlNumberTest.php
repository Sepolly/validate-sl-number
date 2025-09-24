<?php

//-----------------------------------------------------------------------
// Valid Cases
//-----------------------------------------------------------------------
it('returns the same number for a valid SL number with +232', function () {
    expect(isPhoneNumberAValidSLNumber("+23276555950"))
        ->toBe("+23276555950");
});

it('converts a valid SL number starting with 00 to +232', function () {
    expect(isPhoneNumberAValidSLNumber("0023276555950"))
        ->toBe("+23276555950");
});

it('converts a valid SL local number starting with 0 to +232', function () {
    expect(isPhoneNumberAValidSLNumber("076555950"))
        ->toBe("+23276555950");
});


//-----------------------------------------------------------------------
// Invalid Cases
//-----------------------------------------------------------------------
it('returns false for a number with wrong country code', function () {
    expect(isPhoneNumberAValidSLNumber("+23376555950"))
        ->toBeFalse();
});

it('returns false for a number with wrong national destination code (NDC)', function () {
    expect(isPhoneNumberAValidSLNumber("+23299555950"))
        ->toBeFalse();
});

it('returns false for a number that is too short', function () {
    expect(isPhoneNumberAValidSLNumber("07655"))
        ->toBeFalse();
});

it('returns false for a number that is too long', function () {
    expect(isPhoneNumberAValidSLNumber("+23276555950123"))
        ->toBeFalse();
});

it('returns false for a number with letters', function () {
    expect(isPhoneNumberAValidSLNumber("+23276ABC950"))
        ->toBeFalse();
});

it('returns false for an empty string', function () {
    expect(isPhoneNumberAValidSLNumber(""))
        ->toBeFalse();
});

it('returns false for a number with only spaces', function () {
    expect(isPhoneNumberAValidSLNumber("      "))
        ->toBeFalse();
});
